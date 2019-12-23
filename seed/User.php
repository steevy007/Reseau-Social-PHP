<?php
require '../vendor/autoload.php';
require '../Config/database.php';

$faker = Faker\Factory::create();

for($i=0;$i<100;$i++){
  $req=$BDD->prepare("INSERT INTO users(nom,prenom,pseudo,email,password,ville,date_n,sexe,description,pays)
                    VALUES (:nom,:prenom,:pseudo,:email,:password,:ville,:date_n,:sexe,:description,:pays)");

  $req->execute([
      'nom'=>$faker->unique()->name,
      'prenom'=>$faker->unique()->lastName,
      'pseudo'=>$faker->unique()->userName,
      'email'=>$faker->unique()->email,
      'ville'=>$faker->city,
      'password'=>sha1('123456'),
      'date_n'=>$faker->date($format = 'Y-m-d', $max = 'now'),
      'sexe'=>$faker->randomElement($array = array ('F','H')),
      'description'=>$faker->text($maxNbChars = 200),
      'pays'=>$faker->country
  ]);
}