async function request_search(filter?: String): Promise<any> {
   const response:Response = await fetch("/admin/api/search.php", {
      headers: { 
         'Filter': `${filter}`
      }
   });
   const response_json = await response.json();
   return response_json;
}

async function request_table_columns(): Promise<any> {
   const response:Response = await fetch("/admin/api/get_columns.php");
   const response_json = await response.json();
   return response_json;
}

async function request_insert(data: FormData): Promise<any> {
   const response:Response = await fetch("/admin/api/insert.php", {
      method: "POST",
      body: data,
   });
   const response_json = await response.json();
   return response_json;
}
