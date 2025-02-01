interface DatabaseColumn {
   name: string;
   data_type: string;
   unique: boolean;
} 

enum FormType {
   Edit,
   Insert
}

function populate_form(form: HTMLFormElement, columns: Array<DatabaseColumn>, form_type: FormType, values?: Object) {
   // clear form
   form.querySelectorAll("input").forEach( (input:HTMLInputElement) => {
      form.removeChild(input);
   })

   let values_arr: Array<any>;
   if (form_type == FormType.Edit) {
      values_arr = Object.values(values!);
   }

   // populate form
   let i = 0;
   columns.forEach( column => {
      let input:HTMLInputElement = document.createElement("input");
      let value: any;
      if (form_type == FormType.Edit) {
         value = values_arr[i++];
      }

      if (column.name == "id") {
         form.appendChild(input);
         input.setAttribute("type", "hidden");
         input.setAttribute("name", "id");
         if (form_type == FormType.Edit) {
            input.setAttribute("value", value);
         }
         return;
      }

      input.setAttribute("name", column.name);
      input.setAttribute("placeholder", column.name);

      const label = document.createElement("label");
      let rand_id:string = "input-" + (Math.random() * 1000000000000); 
      switch (column.data_type) {
      case "date":
         input.setAttribute("type", "date");
         break;
      case "blob":
      case "mediumblob":
      case "longblob":
         label.setAttribute("class", "input-file");
         label.setAttribute("for", rand_id);
         form.appendChild(label);
         input.setAttribute("type", "file");
         input.setAttribute("id", rand_id);
         input.style.display = "none";
         break;
      default:
         input.setAttribute("type", "text");
         if (form_type == FormType.Edit) {
            input.setAttribute("value", value);
         }
         break;
      }

      form.appendChild(input);
   });

   const input_submit:HTMLInputElement = document.createElement("input");
   input_submit.setAttribute("type", "button");
   form.appendChild(input_submit);

   switch (form_type) {
      case FormType.Edit:
         input_submit.setAttribute("value", "Actualizar valores");
         input_submit.addEventListener("click", () => {
         })
      case FormType.Insert:
         input_submit.setAttribute("value", "Insertar valores");
         input_submit.addEventListener("click", () => {
            const data = new FormData(form);
            request_insert(data)
               .then( () => request_search())
               .then( fields => populate_table_area(fields))
         })
   }
}

function populate_item_fields(item: HTMLElement, columns: Array<DatabaseColumn>, values: Array<any>) {
   let n = 0;
   for (const key in values) {
      const column = columns[n++];

      const field: HTMLElement = document.createElement("tr");
      const key_element: HTMLElement = document.createElement("th");
      const value_element: HTMLElement = document.createElement("td");

      field.setAttribute("class", "field");

      key_element.innerHTML = "<span>" + key + "</span>"

      // Check if is an image
      if (column.name == "imagen") {
         const image_element: HTMLElement = document.createElement("img"); 
         const imagen_bin_data: string = values[key];
         image_element.setAttribute("src", `data:image/jpg;base64,${imagen_bin_data}`)
         const image_copy: HTMLElement = (image_element.cloneNode() as HTMLElement); 

         image_element.setAttribute("width", "50px");
         image_element.style.cursor = "pointer";

         // Open new window when image is clicked
         image_element.addEventListener("click", () => {
            const image_window = window.open("")!;
            image_copy.style.cssText = "max-width: 800px;"
            image_window.document.write(image_copy.outerHTML);
         })

         value_element.appendChild(image_element);
      } else {
         value_element.innerHTML = "<span>" + values[key] + "</span>";
      }

      item.appendChild(field);
      field.appendChild(key_element);
      field.appendChild(value_element);
   }
}

// populate table area with database fields 
async function populate_table_area(fields: Array<Array<any>>) {
   const table_area: HTMLElement = document.getElementById("table-area")!;
   table_area.textContent = "";

   const columns:Array<DatabaseColumn> = await request_table_columns();

   for (let i=0; i < fields.length; i++) {
      const item: HTMLElement = document.createElement("table");
      const field_header: HTMLElement = document.createElement("tr");
      const tag: HTMLElement = document.createElement("th");
      const edit: HTMLElement = document.createElement("td");
      const edit_btn: HTMLElement = document.createElement("button");

      const current_field = fields[i];

      let id;
      for (const key in current_field) {
         if (key == "id") {
            id = current_field[key];
            break;
         } 
      }

      item.setAttribute("class", "item");
      item.setAttribute("table_id", id);

      field_header.setAttribute("class", "field");

      tag.setAttribute("class", "tag");

      edit.setAttribute("class", "edit");

      tag.innerHTML = "Fila " + (i + 1);

      edit_btn.innerHTML = "editar";
      
      // row header
      table_area.appendChild(item);
      item.appendChild(field_header);
      field_header.appendChild(tag);
      field_header.appendChild(edit);
      edit.appendChild(edit_btn);

      // edit button functionality 
      const edit_item_form: HTMLFormElement = (document.getElementById("edit-item")! as HTMLFormElement);
      const add_item_form = document.getElementById("add-item")!;
      edit_btn.addEventListener("click", () => {
         edit_item_form.style.display = "flex";
         add_item_form.style.display = "none";
         populate_form(edit_item_form, columns, FormType.Edit, current_field);
      });

      populate_item_fields(item, columns, current_field);
   } 
}
// home icon functionality
const home_icon: HTMLElement = document.getElementById("home-icon")!;
home_icon.addEventListener("click", () => location.href = "../index.php");

// Edit and add forms functionality
const add_item_form: HTMLFormElement = (document.getElementById("add-item")! as HTMLFormElement);
const edit_item_form: HTMLFormElement = (document.getElementById("edit-item")! as HTMLFormElement);

const add_item_btn: HTMLElement = document.getElementById("add-item-btn")!;

add_item_btn.addEventListener("click", () => {
   add_item_form.style.display = "flex";
   edit_item_form.style.display = "none";
   request_table_columns().then( columns => populate_form(add_item_form, columns, FormType.Insert) );
})

const close_add_item = document.getElementById("close-add-item")!;
close_add_item.addEventListener("click", () => {
   add_item_form.style.display = "none";
})

const close_edit_item = document.getElementById("close-edit-item")!;
close_edit_item.addEventListener("click", () => {
   edit_item_form.style.display = "none";
})

// nav functionality
document.querySelectorAll("nav div").forEach( (element: Element) => {
   const table:string = element.getAttribute("table")!;

   element.addEventListener("click", () => {
      if (window.innerWidth <= 600) {
         hide_nav();
      }
      add_item_form.style.display = "none";
      edit_item_form.style.display = "none";
      document.cookie = "table=" + table 
      document.getElementById("panel-title")!.innerHTML = table;
      request_search().then( fields => populate_table_area(fields) );
   })

})

// Search bar functionality
const search_bar:HTMLInputElement = document.querySelector("#search-bar input")!;
search_bar.addEventListener("keyup", () => {
   const filter = search_bar.value;
   request_search(filter).then( fields => populate_table_area(fields) );
});
