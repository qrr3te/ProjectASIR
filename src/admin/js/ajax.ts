async function request_search(filter?: String): Promise<any> {
   const response:Response = await fetch("/admin/ajax/search.php", {
      headers: { 
         'Filter': `${filter}`
      }
   });
   return await response.json();
}

async function request_table_columns(): Promise<any> {
   const response:Response = await fetch("/admin/ajax/get_columns.php");
   return await response.json();
}

async function request_table_values(id: string): Promise<any> {
   const response:Response = await fetch("/admin/ajax/get_table_values.php", {
      headers: { 
         'Id': `${id}`
      }
   });
   return await response.json();
}

async function request_insert(data: FormData): Promise<any> {
   const response:Response = await fetch("/admin/ajax/insert.php", {
      method: "POST",
      body: data,
   });
   return await response.json();
}

async function request_update(data: FormData): Promise<any> {
   const response:Response = await fetch("/admin/ajax/update.php", {
      method: "POST",
      body: data,
   });
   return await response.json();
}

async function request_delete(id: String): Promise<any> {
   const response:Response = await fetch("/admin/ajax/delete.php", {
      method: "POST",
      headers: {
         'Id': `${id}`
      }
   });
   return await response.json();
}

async function request_stats(): Promise<any> {
   const response:Response = await fetch("/admin/ajax/stats.php");
   return await response.json();
}
