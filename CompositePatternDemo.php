<html>
<body>
  <head>
    <style>
      body {font : 12px verdana; font-weight:bold}
      td {font : 11px verdana;}
    </style>
  </head>

  <?php

  abstract class Obra {
    
    private $nombre;
    private $superficie;
    private $descripcion = array();
    
    public function add(Obra $material) {
     array_push($this->descripcion, $material);
   }
   
   public function remove(Obra $material) {
     array_pop($this->descripcion);
   }
   
   public function hasChildren() {
    return (bool)(count($this->descripcion) > 0);
  }
  
  public function getChild($i) {
    return $this->descripcion[i];
  }
  
  public function getDescription() {
    echo "* Un/a " . $this->getName() . " de " . $this->getSuperficie() . "m";
    if ($this->hasChildren()) {
      echo " que tiene:<br>";
      foreach($this->descripcion as $material) {
       echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
       $material->getDescription();
       echo "</td></tr></table>";
     }        
   }
 }
 
 public function setName($nombre) {
   $this->nombre = $nombre;
 }
 
 public function getName() {
   return $this->nombre;
 }
 
 public function setSuperficie($superficie) {
  $this->Superficie = (double) $superficie;
}

public function getSuperficie() {
 return $this->Superficie;
}

public function sumar($suma){
  if($this->hasChildren()){
    foreach ($this->descripcion as $material) {
      $suma=$material->getSuperficie()+$material->sumar($suma);
      $material->sumar($suma);
    }
  }
  return $suma;
}

}

class Habitacion extends Obra {
  function __construct($name, $superficie) {
    parent::setName($name);
    parent::setSuperficie($superficie);
  }      
}

class Puerta extends Obra {
  function __construct($name, $superficie) {
    parent::setName($name);
    parent::setSuperficie($superficie);
  }   
}

class Ventana extends Obra {
  function __construct($name, $superficie) {
    parent::setName($name);
    parent::setSuperficie($superficie);
  }   
}


//Entrada a la Casa de Richard Walls
$Home = new Puerta("Puerta de entrada o salida", 1.5);
$Entrada = new Habitacion("Entrada", 3);
$Entrada->add($Home);

//Primera Habitacion (Trastero)
$Trastero = new Habitacion("Trastero", 6);
$PuertaTrastero = new Puerta("Puerta del trastero", 1.5);
$VentanaTrastero = new Ventana("Ventana del trastero", 2);
$Trastero->add($PuertaTrastero);
$Trastero->add($VentanaTrastero);

//Segunda Habitacion (Salón)
$Salon = new Habitacion("Salon", 10);
$PuertaSalon1 = new Puerta("Primera puerta del salon", 1.5);
$PuertaSalon2 = new Puerta("Segunda puerta del salon", 1.5);
$Salon->add($PuertaSalon1);
$Salon->add($PuertaSalon2);


//Tercera Habitacion (Habitacion Padres)
$Habitacion1 = new Habitacion("Habitacion de mis padres", 7);
$PuertaHabitacion1 = new Puerta("Puerta habitacion de mis padres", 1.5);
$VentanaHabitacion1 = new Ventana("Ventana de la habitacion de mis padres", 2);
$Habitacion1->add($PuertaHabitacion1);
$Habitacion1->add($VentanaHabitacion1);

//Cuarta Habitacion (Lavabo de mis Padres)
$Lavabo1 = new Habitacion("Lavabo de mis padres", 4);
$PuertaLavabo1 = new Puerta("Puerta del lavabo de mis padres", 1.5);
$Lavabo1->add($PuertaLavabo1);

//Quinta Habitacion (Cocina)
$Cocina = new Habitacion("Cocina", 5);
$PuertaCocina = new Puerta("Puerta de la cocina", 1.5);
$VentanaCocina = new Ventana("Ventana de la cocina", 1);
$Cocina->add($PuertaCocina);
$Cocina->add($VentanaCocina);

//Sexta Habitacion (Lavadero)
$Lavadero = new Habitacion("Lavadero de ropa", 3);
$PuertaLavadero = new Puerta("Puerta del lavadero", 1.5);
$VentanaLavadero = new Ventana("Ventana del lavadero", 4);
$Lavadero->add($PuertaLavadero);
$Lavadero->add($VentanaLavadero);

//Septima Habitacion (Habitacion de Richard Walls)
$Habitacion2 = new Habitacion("Habitacion de Richard Walls", 7);
$PuertaHabitacion2 = new Puerta("Puerta de la Habitacion de Richard Walls", 1.5);
$VentanaHabitacion2 = new Ventana("Ventana de la Habitacion de Richard Walls", 2);
$Habitacion2->add($PuertaHabitacion2);
$Habitacion2->add($VentanaHabitacion2);

//Octava Habitacion (Lavabo de Richard Walls)
$Lavabo2 = new Habitacion("Lavabo de Richard Walls", 4);
$PuertaLavabo2 = new Puerta("Puerta del lavabo de Richard Walls", 1.5);
$Lavabo2->add($PuertaLavabo2);

//Novena Habitacion (Habitacion de Visitas)
$Habitacion3 = new Habitacion("Habitacion para las visitas", 4);
$PuertaHabitacion3 = new Puerta("Puerta de la Habitacion de las visitas", 1.5);
$VentanaHabitacion3 = new Ventana("Ventana de la Habitacion de las visitas", 2);
$Habitacion3->add($PuertaHabitacion3);
$Habitacion3->add($VentanaHabitacion3);

//Décima Habitacion (Terraza)
$Terraza = new Habitacion("Terraza", 3);
$PuertaTerraza = new Puerta("Puerta de la terraza", 2);
$VentanaTerraza = new Ventana("Ventana de la terraza", 3);
$Terraza->add($PuertaTerraza);
$Terraza->add($VentanaTerraza);

//Calculo de la Superficie Total
$Total = new Habitacion("Total", 0);

$Total->add($Entrada);
$Total->add($Trastero);
$Total->add($Salon);
$Total->add($Habitacion1);
$Total->add($Lavabo1);
$Total->add($Cocina);
$Total->add($Lavadero);
$Total->add($Habitacion2);
$Total->add($Lavabo2);
$Total->add($Habitacion3);
$Total->add($Terraza);



echo "Casa de Richard Watterson: <p>";
$Entrada->getDescription();
$Trastero->getDescription();
$Salon->getDescription();
$Habitacion1->getDescription();
$Lavabo1->getDescription();
$Cocina->getDescription();
$Lavadero->getDescription();
$Habitacion2->getDescription();
$Lavabo2->getDescription();
$Habitacion3->getDescription();
$Terraza->getDescription();



echo "Superficie Total: " .$Total->sumar(0);
?>

</body>
</html>
