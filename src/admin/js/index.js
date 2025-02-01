"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var FormType;
(function (FormType) {
    FormType[FormType["Edit"] = 0] = "Edit";
    FormType[FormType["Insert"] = 1] = "Insert";
})(FormType || (FormType = {}));
function populate_form(form, columns, form_type, values) {
    // clear form
    form.querySelectorAll("input").forEach((input) => {
        form.removeChild(input);
    });
    let values_arr;
    if (form_type == FormType.Edit) {
        values_arr = Object.values(values);
    }
    // populate form
    let i = 0;
    columns.forEach(column => {
        let input = document.createElement("input");
        let value;
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
        let rand_id = "input-" + (Math.random() * 1000000000000);
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
    const input_submit = document.createElement("input");
    input_submit.setAttribute("type", "button");
    form.appendChild(input_submit);
    switch (form_type) {
        case FormType.Edit:
            input_submit.setAttribute("value", "Actualizar valores");
            input_submit.addEventListener("click", () => {
            });
        case FormType.Insert:
            input_submit.setAttribute("value", "Insertar valores");
            input_submit.addEventListener("click", () => {
                const data = new FormData(form);
                request_insert(data)
                    .then(() => request_search())
                    .then(fields => populate_table_area(fields));
            });
    }
}
function populate_item_fields(item, columns, values) {
    let n = 0;
    for (const key in values) {
        const column = columns[n++];
        const field = document.createElement("tr");
        const key_element = document.createElement("th");
        const value_element = document.createElement("td");
        field.setAttribute("class", "field");
        key_element.innerHTML = "<span>" + key + "</span>";
        // Check if is an image
        if (column.name == "imagen") {
            const image_element = document.createElement("img");
            const imagen_bin_data = values[key];
            image_element.setAttribute("src", `data:image/jpg;base64,${imagen_bin_data}`);
            const image_copy = image_element.cloneNode();
            image_element.setAttribute("width", "50px");
            image_element.style.cursor = "pointer";
            // Open new window when image is clicked
            image_element.addEventListener("click", () => {
                const image_window = window.open("");
                image_copy.style.cssText = "max-width: 800px;";
                image_window.document.write(image_copy.outerHTML);
            });
            value_element.appendChild(image_element);
        }
        else {
            value_element.innerHTML = "<span>" + values[key] + "</span>";
        }
        item.appendChild(field);
        field.appendChild(key_element);
        field.appendChild(value_element);
    }
}
// populate table area with database fields 
function populate_table_area(fields) {
    return __awaiter(this, void 0, void 0, function* () {
        const table_area = document.getElementById("table-area");
        table_area.textContent = "";
        const columns = yield request_table_columns();
        for (let i = 0; i < fields.length; i++) {
            const item = document.createElement("table");
            const field_header = document.createElement("tr");
            const tag = document.createElement("th");
            const edit = document.createElement("td");
            const edit_btn = document.createElement("button");
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
            const edit_item_form = document.getElementById("edit-item");
            const add_item_form = document.getElementById("add-item");
            edit_btn.addEventListener("click", () => {
                edit_item_form.style.display = "flex";
                add_item_form.style.display = "none";
                populate_form(edit_item_form, columns, FormType.Edit, current_field);
            });
            populate_item_fields(item, columns, current_field);
        }
    });
}
// home icon functionality
const home_icon = document.getElementById("home-icon");
home_icon.addEventListener("click", () => location.href = "../index.php");
// Edit and add forms functionality
const add_item_form = document.getElementById("add-item");
const edit_item_form = document.getElementById("edit-item");
const add_item_btn = document.getElementById("add-item-btn");
add_item_btn.addEventListener("click", () => {
    add_item_form.style.display = "flex";
    edit_item_form.style.display = "none";
    request_table_columns().then(columns => populate_form(add_item_form, columns, FormType.Insert));
});
const close_add_item = document.getElementById("close-add-item");
close_add_item.addEventListener("click", () => {
    add_item_form.style.display = "none";
});
const close_edit_item = document.getElementById("close-edit-item");
close_edit_item.addEventListener("click", () => {
    edit_item_form.style.display = "none";
});
// nav functionality
document.querySelectorAll("nav div").forEach((element) => {
    const table = element.getAttribute("table");
    element.addEventListener("click", () => {
        if (window.innerWidth <= 600) {
            hide_nav();
        }
        document.getElementById("add-item").style.display = "none";
        document.cookie = "table=" + table;
        document.getElementById("panel-title").innerHTML = table;
        request_search().then(fields => populate_table_area(fields));
    });
});
// Search bar functionality
const search_bar = document.querySelector("#search-bar input");
search_bar.addEventListener("keyup", () => {
    const filter = search_bar.value;
    request_search(filter).then(fields => populate_table_area(fields));
});
