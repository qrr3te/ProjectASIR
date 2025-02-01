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
function request_search(filter) {
    return __awaiter(this, void 0, void 0, function* () {
        const response = yield fetch("/admin/api/search.php", {
            headers: {
                'Filter': `${filter}`
            }
        });
        const response_json = yield response.json();
        return response_json;
    });
}
function request_table_columns() {
    return __awaiter(this, void 0, void 0, function* () {
        const response = yield fetch("/admin/api/get_columns.php");
        const response_json = yield response.json();
        return response_json;
    });
}
function request_insert(data) {
    return __awaiter(this, void 0, void 0, function* () {
        const response = yield fetch("/admin/api/insert.php", {
            method: "POST",
            body: data,
        });
        const response_json = yield response.json();
        return response_json;
    });
}
