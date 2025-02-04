interface DatabaseColumn {
   name: string;
   data_type: string;
   unique: boolean;
} 

enum FormType {
   Edit,
   Insert
}

function get_table(table_id: string): HTMLElement | false {
   const table_area: HTMLElement = document.getElementById("table-area")!;
   const tables: NodeListOf<HTMLElement> = table_area.querySelectorAll("table");
   let table:HTMLElement;
   
   for (let i = 0; i < tables.length; i++) {
      if (tables[i].getAttribute("table_id") == table_id) {
         table = tables[i];
      }
   }

   if (table! == undefined) {
      return false
   }

   return table;
}

function update_table(id: string, values: Object): void {
   const values_arr: Array<string> = Object.values(values);
   const table = get_table(id);

   if (!table) {
      console.log("table not found");
      return;
   }

   const fields: HTMLCollectionOf<Element> = table!.getElementsByClassName("field-value");
   
   for (let i = 0; i < fields.length; i++) {
      if (fields[i].hasAttribute("is-image")) {
         request_search().then( (rows: any[]) => populate_table_area(rows) ); 
         return;
      } 
      fields[i].innerHTML = values_arr[i];
   }
}

// returns submit button and assing events depending on form type
function create_submit_button(form: HTMLFormElement, form_type: FormType): HTMLInputElement {
   const input_submit:HTMLInputElement = document.createElement("input");
   input_submit.setAttribute("type", "button");

   switch (form_type) {
      case FormType.Edit:
         input_submit.setAttribute("value", "Actualizar valores");
         input_submit.addEventListener("click", () => {
            const data:FormData = new FormData(form);
            const id_input:HTMLInputElement = form.querySelector("input[name=id]")!;
            const id_value = id_input.value;
            request_update(data)
               .then( () => request_table_values(id_value))
               .then( values => update_table(id_value, values) );
         })
         break;
      case FormType.Insert:
         input_submit.setAttribute("value", "Insertar valores");
         input_submit.addEventListener("click", () => {
            const data:FormData = new FormData(form);
            request_insert(data)
               .then( () => request_search())
               .then( fields => populate_table_area(fields));
         })
         break;
   }
   return input_submit;
}

// returns input element or input and label if input should be type file 
function create_input_field(column: DatabaseColumn, value: string | undefined): {input: HTMLInputElement, label?: HTMLElement} {
   const input:HTMLInputElement = document.createElement("input");
   const label = document.createElement("label");

   if (column.name == "id") {
      input.setAttribute("type", "hidden");
      input.setAttribute("name", "id");
      if (value !== undefined) {
         input.setAttribute("value", value);
      }
      return { input };
   }

   input.setAttribute("name", column.name);
   input.setAttribute("placeholder", column.name);

   const rand_id:string = "input-" + (Math.random() * 1000000000000); 
   
   switch (column.data_type) {
      case "date":
         if (value !== undefined) {
            input.setAttribute("value", value);
         }
         input.setAttribute("type", "date");
         break;
      case "blob":
      case "mediumblob":
      case "longblob":
         label.setAttribute("class", "input-file");
         label.setAttribute("for", rand_id);
         label.innerHTML = `Selecciona una imagen <svg width="20px" height="20px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1H15V15H1V1ZM6 9L8 11L13 6V13H3V12L6 9ZM6.5 7C7.32843 7 8 6.32843 8 5.5C8 4.67157 7.32843 4 6.5 4C5.67157 4 5 4.67157 5 5.5C5 6.32843 5.67157 7 6.5 7Z" fill="#000000"></path> </g></svg>`;
         input.setAttribute("type", "file");
         input.setAttribute("id", rand_id);
         input.style.display = "none";
         return {input, label};
      default:
         if (column.name == "password") {
            input.setAttribute("type", "password");
            break;
         }

         if (value !== undefined) {
            input.setAttribute("value", value);
         } 

         input.setAttribute("type", "text");
         break;
   }
   return { input };
}

// clear all inputs and labels from form
function clear_form(form: HTMLFormElement) {
   form.querySelectorAll("input").forEach( (input:HTMLInputElement) => {
      form.removeChild(input);
   })
   form.querySelectorAll("label").forEach( (label:HTMLElement) => {
      form.removeChild(label);
   })
}

// populate update or insert form depending on form_type 
function populate_form(form: HTMLFormElement, columns: Array<DatabaseColumn>, form_type: FormType, values?: Object) {
   clear_form(form);

   let values_arr: Array<any>;
   if (form_type == FormType.Edit) {
      values_arr = Object.values(values!);
   }

   let value_index = 0;
   columns.forEach( column => {

      let value: undefined | string;
      if (values === undefined ) {
         value = undefined;
      } else {
         value = values_arr[value_index++];
      }

      const {input, label} = create_input_field(column, value);

      if (label) {
         form.appendChild(label);
      }
      form.appendChild(input);
   });
   
   form.appendChild(create_submit_button(form, form_type));
}

// returns tr element containing database field values
function create_item_field(column: DatabaseColumn, value: string): HTMLElement {
   const field: HTMLElement = document.createElement("tr");
   const key_element: HTMLElement = document.createElement("th");
   const value_element: HTMLElement = document.createElement("td");

   field.setAttribute("class", "field");

   key_element.innerHTML = "<span>" + column.name + "</span>"

   // Check if is an image
   if (column.name == "imagen") {
      const image_element: HTMLElement = document.createElement("img"); 
      const imagen_bin_data: string = value;
      image_element.setAttribute("src", `data:image/jpg;base64,${imagen_bin_data}`)
      image_element.setAttribute("class", "field-value")
      image_element.setAttribute("is-image", "")
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
      value_element.innerHTML = "<span class='field-value'>" + value + "</span>";
   }

   field.appendChild(key_element);
   field.appendChild(value_element);
   return field;
}

// returns div element as a header for the target table
function create_table_header(id: Number | string, columns: DatabaseColumn[], field: Object, target_table: HTMLElement): HTMLElement {
   const table_header = document.createElement("div");
   table_header.setAttribute("class", "table-header");

   const show_table_btn = document.createElement("span");
   show_table_btn.innerHTML = `table ${id}`;
   show_table_btn.setAttribute("class", "show-table-btn");
   show_table_btn.innerHTML = "▸";

   // show or hide target_table 
   show_table_btn.addEventListener ("click", () => {
      if (target_table.style.display != "none") {
         target_table.style.display = "none";
         show_table_btn.innerHTML = "▸"
      } else {
         target_table.style.display = "table";
         show_table_btn.innerHTML = "▾"
      }
   })


   const title = document.createElement("span");
   title.innerHTML = `table ${id}`;
   title.setAttribute("class", "table-title");

   const edit_btn: HTMLElement = document.createElement("button");
   edit_btn.innerHTML = "Editar tabla";
   edit_btn.setAttribute("class", "edit-table-btn");
   
   // edit button functionality
   const edit_item_form: HTMLFormElement = (document.getElementById("edit-item")! as HTMLFormElement);
   const add_item_form = document.getElementById("add-item")!;
   edit_btn.addEventListener("click", () => {
      edit_item_form.style.display = "flex";
      add_item_form.style.display = "none";
      populate_form(edit_item_form, columns, FormType.Edit, field);
   });

   table_header.appendChild(show_table_btn);
   table_header.appendChild(title);
   table_header.appendChild(edit_btn);

   return table_header;
}

// populate table area with database fields 
async function populate_table_area(rows: Array<any>) {
   const table_area: HTMLElement = document.getElementById("table-area")!;
   table_area.textContent = "";

   const columns:Array<DatabaseColumn> = await request_table_columns();

   for (let i=0; i < rows.length; i++) {
      const current_row = rows[i];

      let id: string = "none";
      for (const key in current_row) {
         if (key == "id") {
            id = current_row[key];
            break;
         } 
      }

      const table: HTMLElement = document.createElement("table");
      table.setAttribute("class", "item");
      table.setAttribute("table_id", id);

      // table is hide by default
      table.style.display = "none";

      table_area.appendChild(create_table_header(id, columns, current_row, table));
      table_area.appendChild(table);
      
      columns.forEach( (column) => {
         const value = current_row[column.name];
         table.appendChild(create_item_field(column, value));
      })

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
