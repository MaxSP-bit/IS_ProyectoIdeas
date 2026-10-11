<?php

// INTERFACES DE LOS PRODUCTOS

// Define qué métodos debe tener cualquier botón, independientemente del sistema operativo.
// Las clases que implementen esta interfaz deben definirlo.
interface Boton
{
    // Declara el método que mostrará el botón.
    public function pintar();
}

// Define qué métodos debe tener cualquier checkbox.
interface Checkbox
{
    // Declara el método que mostrará el checkbox.
    public function pintar();
}


// PRODUCTOS CONCRETOS: BOTONES

// Representa un botón con apariencia de Windows.
// Implementa la interfaz Boton, por lo que debe definir pintar().
class WindowsButton implements Boton
{
    // Muestra el texto que representa al botón de Windows.
    public function pintar()
    {
        echo "Botón de Windows";
    }
}

// Representa un botón con apariencia de Mac.
class MacButton implements Boton
{
    // Muestra el texto que representa al botón de Mac.
    public function pintar()
    {
        echo "Botón de Mac";
    }
}


// PRODUCTOS CONCRETOS: CHECKBOXES

// Representa un checkbox con apariencia de Windows.
class WindowsCheckbox implements Checkbox
{
    // Muestra el texto que representa al checkbox de Windows.
    public function pintar()
    {
        echo "Checkbox de Windows";
    }
}

// Representa un checkbox con apariencia de Mac.
class MacCheckbox implements Checkbox
{
    // Muestra el texto que representa al checkbox de Mac.
    public function pintar()
    {
        echo "Checkbox de Mac";
    }
}


// INTERFAZ DE LA FÁBRICA ABSTRACTA

// Define los métodos que debe tener cualquier fábrica
// de componentes gráficos, sin especificar qué sistema crea.
interface GUIFactory
{
    // Declara un método que debe devolver un objeto de tipo Boton.
    public function crearBoton(): Boton;

    // Declara un método que debe devolver un objeto de tipo Checkbox.
    public function crearCheckbox(): Checkbox;
}


// FÁBRICAS CONCRETAS

// Fábrica encargada de crear componentes de Windows.
// Implementa GUIFactory, por lo que debe definir ambos métodos.
class WindowsFactory implements GUIFactory
{
    // Crea y devuelve un botón de Windows.
    public function crearBoton(): Boton
    {
        return new WindowsButton();
    }

    // Crea y devuelve un checkbox de Windows.
    public function crearCheckbox(): Checkbox
    {
        return new WindowsCheckbox();
    }
}

// Fábrica encargada de crear componentes de Mac.
class MacFactory implements GUIFactory
{
    // Crea y devuelve un botón de Mac.
    public function crearBoton(): Boton
    {
        return new MacButton();
    }

    // Crea y devuelve un checkbox de Mac.
    public function crearCheckbox(): Checkbox
    {
        return new MacCheckbox();
    }
}


// CÓDIGO CLIENTE: UTILIZACIÓN DE LA FÁBRICA

// Elegimos la fábrica que queremos utilizar.
$fabrica = new WindowsFactory();

// Solicitamos a la fábrica que cree un botón.
$boton = $fabrica->crearBoton();

// Solicitamos a la fábrica que cree un checkbox.
$checkbox = $fabrica->crearCheckbox();

// Mostramos el botón creado.
$boton->pintar();
echo PHP_EOL;

// Mostramos el checkbox creado.
$checkbox->pintar();
echo PHP_EOL;