<?php 
class admin {
   public $username;
   public $nombre;
   public $apellido;
   public $email;
   public $telefono;
   public $password;

   function __construct()
   {
      $this->username = "administrator";
      $this->nombre = "admin";
      $this->apellido = "admin";
      $this->email = "administrator@alamedamotors.com";
      $this->telefono = "123456789";
      // It should be changed in prodbranch
      $this->password = password_hash("ArchTheBest", PASSWORD_ARGON2ID);
   }

   public function ask_values(): void {
      $this->username = readline("username: ");
      $this->nombre = readline("nombre: ");
      $this->apellido = readline("apellido: ");
      $this->email = readline("email: ");
      $this->telefono = readline("telefono: ");
      // It should be changed in prodbranch
      $this->password = password_hash(readline("password: "), PASSWORD_ARGON2ID);
   }
}
?>
