var t1=0; //Variable tiempo asignado actividad 1 
var ot1=0; // Variable nota actividad 1
t1=parseFloat(t1); // Casteo a flotante variable tiempo asignado actividad 1
ot1=parseFloat(ot1); // Casteo a flotante variable nota actividad 1

var t2=0; //Variable tiempo asignado actividad 2 
var ot2=0; // Variable nota actividad 2
t2=parseFloat(t2); // Casteo a flotante variable tiempo asignado actividad 2
ot2=parseFloat(ot2); // Casteo a flotante variable nota actividad 2

var t3=0; //Variable tiempo asignado actividad 3
var ot3=0; // Variable nota actividad 3
t3=parseFloat(t3); // Casteo a flotante variable tiempo asignado actividad 3
ot3=parseFloat(ot3); // Casteo a flotante variable nota actividad 3

var t4=0; //Variable tiempo asignado actividad 4
var ot4=0; // Variable nota actividad 4
t4=parseFloat(t4); // Casteo a flotante variable tiempo asignado actividad 4
ot4=parseFloat(ot4); // Casteo a flotante variable nota actividad 4

var t5=0; //Variable tiempo asignado actividad 5
var ot5=0; // Variable nota actividad 5
t5=parseFloat(t5); // Casteo a flotante variable tiempo asignado actividad 5
ot5=parseFloat(ot5); // Casteo a flotante variable nota actividad 5

//Funcion que permite aplicar el color seleccionado por el usuario para el fondo de todas las vistas
function cambiar_fondo(id){
    document.body.className='fondo'+id;
    document.getElementById("color").value=id;
}

//Función que agrega un contador de caracteres al momento de ingresar un rut al crear un académico
function contadorRut(obj){
    var largoStr = obj.value.length;
    if (largoStr > 7){
        document.getElementById("contadorRut").innerHTML = '<span style="color: grey; float: right;">'+largoStr+'/9</span>';
    }else{
        document.getElementById("contadorRut").innerHTML = '<span style="color: red;">Mínimo 8 caracteres</span><span style="color: grey; float: right;">'+largoStr+'/9</span>';
    }
}

//Funcion que agrega un contador de caracteres al momento de añadir un comentario sobre una evaluación académica.
function contadorComentario(obj){
    var largoStr = obj.value.length;
    document.getElementById("contadorComentario").innerHTML = '<span style="color: grey;">Máximo 200 caracteres</span><span style="float: right; color: grey">'+largoStr+'/200</span>';
}

//Funcion que agrega un contador de la ponderacion total ingresada en una evaluación. Se encarga de habilitar/desabilitar botón de envío.
function contadorPonderacion(){
    //Calculo para sumar las ponderaciones ingresadas
    var ta1 = parseFloat(document.getElementById("tiempoAsignado1").value);
    var ta2 = parseFloat(document.getElementById("tiempoAsignado2").value);
    var ta3 = parseFloat(document.getElementById("tiempoAsignado3").value);
    var ta4 = parseFloat(document.getElementById("tiempoAsignado4").value);
    var ta5 = parseFloat(document.getElementById("tiempoAsignado5").value);
    if(isNaN(ta1)){
        ta1=0;
    }
    if(isNaN(ta2)){
        ta2=0;
    }
    if(isNaN(ta3)){
        ta3=0;
    }
    if(isNaN(ta4)){
        ta4=0;
    }
    if(isNaN(ta5)){
        ta5=0;
    }
    var total = ta1 + ta2 + ta3 + ta4 + ta5;

    //Obtencion valores de notas de una actividad
    var e1=parseFloat(document.getElementById("1e").value);
    var mb1=parseFloat(document.getElementById("1mb").value);
    var b1=parseFloat(document.getElementById("1b").value);
    var r1=parseFloat(document.getElementById("1r").value);
    var d1=parseFloat(document.getElementById("1d").value);
    if(isNaN(e1)){
        e1=0;
    }
    if(isNaN(mb1)){
        mb1=0;
    }
    if(isNaN(b1)){
        b1=0;
    }
    if(isNaN(r1)){
        r1=0;
    }
    if(isNaN(d1)){
        d1=0;
    }
    fila1=e1+mb1+b1+r1+d1;

    var e2=parseFloat(document.getElementById("2e").value);
    var mb2=parseFloat(document.getElementById("2mb").value);
    var b2=parseFloat(document.getElementById("2b").value);
    var r2=parseFloat(document.getElementById("2r").value);
    var d2=parseFloat(document.getElementById("2d").value);
    if(isNaN(e2)){
        e2=0;
    }
    if(isNaN(mb2)){
        mb2=0;
    }
    if(isNaN(b2)){
        b2=0;
    }
    if(isNaN(r2)){
        r2=0;
    }
    if(isNaN(d2)){
        d2=0;
    }
    fila2=e2+mb2+b2+r2+d2;

    var e3=parseFloat(document.getElementById("3e").value);
    var mb3=parseFloat(document.getElementById("3mb").value);
    var b3=parseFloat(document.getElementById("3b").value);
    var r3=parseFloat(document.getElementById("3r").value);
    var d3=parseFloat(document.getElementById("3d").value);
    if(isNaN(e3)){
        e3=0;
    }
    if(isNaN(mb3)){
        mb3=0;
    }
    if(isNaN(b3)){
        b3=0;
    }
    if(isNaN(r3)){
        r3=0;
    }
    if(isNaN(d3)){
        d3=0;
    }
    fila3=e3+mb3+b3+r3+d3;

    var e4=parseFloat(document.getElementById("4e").value);
    var mb4=parseFloat(document.getElementById("4mb").value);
    var b4=parseFloat(document.getElementById("4b").value);
    var r4=parseFloat(document.getElementById("4r").value);
    var d4=parseFloat(document.getElementById("4d").value);
    if(isNaN(e4)){
        e4=0;
    }
    if(isNaN(mb4)){
        mb4=0;
    }
    if(isNaN(b4)){
        b4=0;
    }
    if(isNaN(r4)){
        r4=0;
    }
    if(isNaN(d4)){
        d4=0;
    }
    fila4=e4+mb4+b4+r4+d4;

    var e5=parseFloat(document.getElementById("5e").value);
    var mb5=parseFloat(document.getElementById("5mb").value);
    var b5=parseFloat(document.getElementById("5b").value);
    var r5=parseFloat(document.getElementById("5r").value);
    var d5=parseFloat(document.getElementById("5d").value);
    if(isNaN(e5)){
        e5=0;
    }
    if(isNaN(mb5)){
        mb5=0;
    }
    if(isNaN(b5)){
        b5=0;
    }
    if(isNaN(r5)){
        r5=0;
    }
    if(isNaN(d5)){
        d5=0;
    }
    fila5=e5+mb5+b5+r5+d5;

    //Condiciones donde hay que bloquear el botón de envio de la evaluación
    var correcto=1;

    if(ta1!=0 && fila1==0){
        correcto=0;
    }else if(ta2!=0 && fila2==0){
        correcto=0;
    }else if(ta3!=0 && fila3==0){
        correcto=0;
    }else if(ta4!=0 && fila4==0){
        correcto=0;
    }else if(ta5!=0 && fila5==0){
        correcto=0;
    }else if(ta1==0 && fila1!=0){
        correcto=0;
    }else if(ta2==0 && fila2!=0){
        correcto=0;
    }else if(ta3==0 && fila3!=0){
        correcto=0;
    }else if(ta4==0 && fila4!=0){
        correcto=0;
    }else if(ta5==0 && fila5!=0){
        correcto=0;
    }

    if(total == 100){
        document.getElementById("contadorTtalPonderacion").innerHTML = '<span style="color: grey;">'+total+' %</span>'
        if(correcto==1){
            document.getElementById("boton-evaluar").disabled = false;
        }else{
            document.getElementById("boton-evaluar").disabled = true;
        }
    }else{
        document.getElementById("boton-evaluar").disabled = true;
        document.getElementById("contadorTtalPonderacion").innerHTML = '<span style="color: red;">'+total+' %</span>'
    }
}

// Funcion para truncar un valor asignado por parametro de entrada
function toTrunc(value,n){
    var x=(value.toString()+".0").split(".");
    return parseFloat(x[0]+"."+x[1].substr(0,n));
}

//Funcion para mostrar u ocultar una seccion de la vista de evualuacion
function Mostrar_ocultar(id){
    var id=document.getElementById(id);
    if(id.style.display == "none"){
        id.style.display = "block";
    }else{
        id.style.display = "none";
    }
}

// Funcion que calcula la suma los calculos de nota obtenido por cada actividad generando el promedio de evaluacion del docente
function calcular_promedio(){
    var tc1 = parseFloat(document.getElementById("1tc").value);
    var tc2 = parseFloat(document.getElementById("2tc").value);
    var tc3 = parseFloat(document.getElementById("3tc").value);
    var tc4 = parseFloat(document.getElementById("4tc").value);
    var tc5 = parseFloat(document.getElementById("5tc").value);
    if(isNaN(tc1)){
        tc1=0;
    }
    if(isNaN(tc2)){
        tc2=0;
    }
    if(isNaN(tc3)){
        tc3=0;
    }
    if(isNaN(tc4)){
        tc4=0;
    }
    if(isNaN(tc5)){
        tc5=0;
    }
    if(tc1>0 || tc2>0 || tc3>0 || tc4>0 || tc5>0){
        document.getElementById("nota").value=toTrunc((tc1+tc2+tc3+tc4+tc5),1);
    }else{
        document.getElementById("nota").value="";
    }    
}


// Función para calcular la nota de actividad 1 ((t1*ot1)/100) y manejo de atributo readonly en las casillas correspondientes
function prom1(valor,tipo){
    valor=parseFloat(valor);
    if(isNaN(valor)){
        document.getElementById("1e").readOnly = false;
        document.getElementById("1e").value = ""; 
        document.getElementById("1mb").readOnly = false;
        document.getElementById("1mb").value = "";
        document.getElementById("1b").readOnly = false;
        document.getElementById("1b").value = "";
        document.getElementById("1r").readOnly = false;
        document.getElementById("1r").value = "";
        document.getElementById("1d").readOnly = false;
        document.getElementById("1d").value = "";
        document.getElementById("1tc").value = "";
        ot1=0;
    }
    else if(tipo==0){
        t1=valor;
        if(document.getElementById("1e").value != ""){
            ot1=document.getElementById("1e").value;
        }else if(document.getElementById("1mb").value != ""){
            ot1=document.getElementById("1mb").value;
        }else if(document.getElementById("1b").value != ""){
            ot1=document.getElementById("1b").value;
        }else if(document.getElementById("1r").value != ""){
            ot1=document.getElementById("1r").value;
        }else if(document.getElementById("1d").value != ""){
            ot1=document.getElementById("1d").value;
        }
    }
    else if(tipo==1){
        ot1=valor;
        document.getElementById("1e").readOnly = false;
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1mb").value = "";
        document.getElementById("1b").readOnly = true;
        document.getElementById("1b").value = "";
        document.getElementById("1r").readOnly = true;
        document.getElementById("1r").value = "";
        document.getElementById("1d").readOnly = true;
        document.getElementById("1d").value = "";
    }
    else if(tipo==2){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1e").value = "";
        document.getElementById("1mb").readOnly =false;
        document.getElementById("1b").readOnly = true;
        document.getElementById("1b").value = "";
        document.getElementById("1r").readOnly = true;
        document.getElementById("1r").value = "";
        document.getElementById("1d").readOnly = true;
        document.getElementById("1d").value = "";
    }
    else if(tipo==3){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1e").value = "";
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1mb").value = "";
        document.getElementById("1b").readOnly = false;
        document.getElementById("1r").readOnly = true;
        document.getElementById("1r").value = "";
        document.getElementById("1d").readOnly = true;
        document.getElementById("1d").value = "";
    }
    else if(tipo==4){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1e").value = "";
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1mb").value = "";
        document.getElementById("1b").readOnly = true;
        document.getElementById("1b").value = "";
        document.getElementById("1r").readOnly = false;
        document.getElementById("1d").readOnly = true;
        document.getElementById("1d").value = "";
    }
    else if(tipo==5){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1e").value = "";
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1mb").value = "";
        document.getElementById("1b").readOnly = true;
        document.getElementById("1b").value = "";
        document.getElementById("1r").readOnly = true;
        document.getElementById("1r").value = "";
        document.getElementById("1d").readOnly = false;
    }
    if(!isNaN(parseFloat(document.getElementById("tiempoAsignado1").value))){
        t1=parseFloat(document.getElementById("tiempoAsignado1").value);
    }
    if(!isNaN(valor)){
        document.getElementById("1tc").value =toTrunc(((t1*ot1)/100),1);
    }
    calcular_promedio();
}

// Función para calcular la nota de actividad 2 ((t2*ot2)/100) y manejo de atributo readonly en las casillas correspondientes
function prom2(valor,tipo){
    valor=parseFloat(valor);
    if(isNaN(valor)){
        document.getElementById("2e").readOnly = false; 
        document.getElementById("2e").value = "";
        document.getElementById("2mb").readOnly = false;
        document.getElementById("2mb").value = "";
        document.getElementById("2b").readOnly = false;
        document.getElementById("2b").value = "";
        document.getElementById("2r").readOnly = false;
        document.getElementById("2r").value = "";
        document.getElementById("2d").readOnly = false;
        document.getElementById("2d").value = "";
        document.getElementById("2tc").value = "";
        ot2=0;
    }
    else if(tipo==0){
        t2=valor;
        if(document.getElementById("2e").value != ""){
            ot2=document.getElementById("2e").value;
        }else if(document.getElementById("2mb").value != ""){
            ot2=document.getElementById("2mb").value;
        }else if(document.getElementById("2b").value != ""){
            ot2=document.getElementById("2b").value;
        }else if(document.getElementById("2r").value != ""){
            ot2=document.getElementById("2r").value;
        }else if(document.getElementById("2d").value != ""){
            ot2=document.getElementById("2d").value;
        }
    }
    else if(tipo==1){
        ot2=valor;
        document.getElementById("2e").readOnly = false;
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2mb").value = "";
        document.getElementById("2b").readOnly = true;
        document.getElementById("2b").value = "";
        document.getElementById("2r").readOnly = true;
        document.getElementById("2r").value = "";
        document.getElementById("2d").readOnly = true;
        document.getElementById("2d").value = "";
    }
    else if(tipo==2){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2e").value = "";
        document.getElementById("2mb").readOnly =false;
        document.getElementById("2b").readOnly = true;
        document.getElementById("2b").value = "";
        document.getElementById("2r").readOnly = true;
        document.getElementById("2r").value = "";
        document.getElementById("2d").readOnly = true;
        document.getElementById("2d").value = "";
    }
    else if(tipo==3){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2e").value = "";
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2mb").value = "";
        document.getElementById("2b").readOnly = false;
        document.getElementById("2r").readOnly = true;
        document.getElementById("2r").value = "";
        document.getElementById("2d").readOnly = true;
        document.getElementById("2d").value = "";
    }
    else if(tipo==4){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2e").value = "";
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2mb").value = "";
        document.getElementById("2b").readOnly = true;
        document.getElementById("2b").value = "";
        document.getElementById("2r").readOnly = false;
        document.getElementById("2d").readOnly = true;
        document.getElementById("2d").value = "";
    }
    else if(tipo==5){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2e").value = "";
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2mb").value = "";
        document.getElementById("2b").readOnly = true;
        document.getElementById("2b").value = "";
        document.getElementById("2r").readOnly = true;
        document.getElementById("2r").value = "";
        document.getElementById("2d").readOnly = false;
    }
    if(!isNaN(parseFloat(document.getElementById("tiempoAsignado2").value))){
        t2=parseFloat(document.getElementById("tiempoAsignado2").value);
    }
    if(!isNaN(valor)){
        document.getElementById("2tc").value =toTrunc(((t2*ot2)/100),1);
    }
    calcular_promedio();
}
// Función para calcular la nota de actividad 3 ((t3*ot3)/100) y manejo de atributo readonly en las casillas correspondientes
function prom3(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("3e").readOnly = false; 
        document.getElementById("3e").value = "";
        document.getElementById("3mb").readOnly = false;
        document.getElementById("3mb").value = "";
        document.getElementById("3b").readOnly = false;
        document.getElementById("3b").value = "";
        document.getElementById("3r").readOnly = false;
        document.getElementById("3r").value = "";
        document.getElementById("3d").readOnly = false;
        document.getElementById("3d").value = "";
        document.getElementById("3tc").value = "";
        ot3=0;
    }
    else if(tipo==0){
        t3=valor;
        if(document.getElementById("3e").value != ""){
            ot3=document.getElementById("3e").value;
        }else if(document.getElementById("3mb").value != ""){
            ot3=document.getElementById("3mb").value;
        }else if(document.getElementById("3b").value != ""){
            ot3=document.getElementById("3b").value;
        }else if(document.getElementById("3r").value != ""){
            ot3=document.getElementById("3r").value;
        }else if(document.getElementById("3d").value != ""){
            ot3=document.getElementById("3d").value;
        }
    }
    else if(tipo==1){
        ot3=valor;
        document.getElementById("3e").readOnly = false;
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3mb").value = "";
        document.getElementById("3b").readOnly = true;
        document.getElementById("3b").value = "";
        document.getElementById("3r").readOnly = true;
        document.getElementById("3r").value = "";
        document.getElementById("3d").readOnly = true;
        document.getElementById("3d").value = "";
    }
    else if(tipo==2){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3e").value = "";
        document.getElementById("3mb").readOnly =false;
        document.getElementById("3b").readOnly = true;
        document.getElementById("3b").value = "";
        document.getElementById("3r").readOnly = true;
        document.getElementById("3r").value = "";
        document.getElementById("3d").readOnly = true;
        document.getElementById("3d").value = "";
    }
    else if(tipo==3){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3e").value = "";
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3mb").value = "";
        document.getElementById("3b").readOnly = false;
        document.getElementById("3r").readOnly = true;
        document.getElementById("3r").value = "";
        document.getElementById("3d").readOnly = true;
        document.getElementById("3d").value = "";
    }
    else if(tipo==4){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3e").value = "";
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3mb").value = "";
        document.getElementById("3b").readOnly = true;
        document.getElementById("3b").value = "";
        document.getElementById("3r").readOnly = false;
        document.getElementById("3d").readOnly = true;
        document.getElementById("3d").value = "";
    }
    else if(tipo==5){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3e").value = "";
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3mb").value = "";
        document.getElementById("3b").readOnly = true;
        document.getElementById("3b").value = "";
        document.getElementById("3r").readOnly = true;
        document.getElementById("3r").value = "";
        document.getElementById("3d").readOnly = false;
    }
    if(!isNaN(parseFloat(document.getElementById("tiempoAsignado3").value))){
        t3=parseFloat(document.getElementById("tiempoAsignado3").value);
    }
    if(!isNaN(valor)){
        document.getElementById("3tc").value = toTrunc(((t3*ot3)/100),1);
    }
    calcular_promedio();
}
// Función para calcular la nota de actividad 4 ((t4*ot4)/100) y manejo de atributo readonly en las casillas correspondientes
function prom4(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("4e").readOnly = false;
        document.getElementById("4e").value = ""; 
        document.getElementById("4mb").readOnly = false;
        document.getElementById("4mb").value = ""; 
        document.getElementById("4b").readOnly = false;
        document.getElementById("4b").value = ""; 
        document.getElementById("4r").readOnly = false;
        document.getElementById("4r").value = ""; 
        document.getElementById("4d").readOnly = false;
        document.getElementById("4d").value = ""; 
        document.getElementById("4tc").value = ""; 
        ot4=0;
    }
    else if(tipo==0){
        t4=valor;
        if(document.getElementById("4e").value != ""){
            ot4=document.getElementById("4e").value;
        }else if(document.getElementById("4mb").value != ""){
            ot4=document.getElementById("4mb").value;
        }else if(document.getElementById("4b").value != ""){
            ot4=document.getElementById("4b").value;
        }else if(document.getElementById("4r").value != ""){
            ot4=document.getElementById("4r").value;
        }else if(document.getElementById("4d").value != ""){
            ot4=document.getElementById("4d").value;
        }
    }
    else if(tipo==1){
        ot4=valor;
        document.getElementById("4e").readOnly = false;
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4mb").value = "";
        document.getElementById("4b").readOnly = true;
        document.getElementById("4b").value = "";
        document.getElementById("4r").readOnly = true;
        document.getElementById("4r").value = "";
        document.getElementById("4d").readOnly = true;
        document.getElementById("4d").value = "";
    }
    else if(tipo==2){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4e").value = "";
        document.getElementById("4mb").readOnly =false;
        document.getElementById("4b").readOnly = true;
        document.getElementById("4b").value = "";
        document.getElementById("4r").readOnly = true;
        document.getElementById("4r").value = "";
        document.getElementById("4d").readOnly = true;
        document.getElementById("4d").value = "";
    }
    else if(tipo==3){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4e").value = "";
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4mb").value = "";
        document.getElementById("4b").readOnly = false;
        document.getElementById("4r").readOnly = true;
        document.getElementById("4r").value = "";
        document.getElementById("4d").readOnly = true;
        document.getElementById("4d").value = "";
    }
    else if(tipo==4){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4e").value = "";
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4mb").value = "";
        document.getElementById("4b").readOnly = true;
        document.getElementById("4b").value = "";
        document.getElementById("4r").readOnly = false;
        document.getElementById("4d").readOnly = true;
        document.getElementById("4d").value = "";
    }
    else if(tipo==5){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4e").value = "";
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4mb").value = "";
        document.getElementById("4b").readOnly = true;
        document.getElementById("4b").value = "";
        document.getElementById("4r").readOnly = true;
        document.getElementById("4r").value = "";
        document.getElementById("4d").readOnly = false;
    }
    if(!isNaN(parseFloat(document.getElementById("tiempoAsignado4").value))){
        t4=parseFloat(document.getElementById("tiempoAsignado4").value);
    }
    if(!isNaN(valor)){
        document.getElementById("4tc").value =toTrunc(((t4*ot4)/100),1);
    }
    calcular_promedio();
}
// Función para calcular la nota de actividad 5 ((t5*ot5)/100) y manejo de atributo readonly en las casillas correspondientes
function prom5(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("5e").readOnly = false;
        document.getElementById("5e").value = ""; 
        document.getElementById("5mb").readOnly = false;
        document.getElementById("5mb").value = ""; 
        document.getElementById("5b").readOnly = false;
        document.getElementById("5b").value = ""; 
        document.getElementById("5r").readOnly = false;
        document.getElementById("5r").value = ""; 
        document.getElementById("5d").readOnly = false;
        document.getElementById("5d").value = ""; 
        document.getElementById("5tc").value = ""; 
        ot5=0;
    }
    else if(tipo==0){
        t5=valor;
        if(document.getElementById("5e").value != ""){
            ot5=document.getElementById("5e").value;
        }else if(document.getElementById("5mb").value != ""){
            ot5=document.getElementById("5mb").value;
        }else if(document.getElementById("5b").value != ""){
            ot5=document.getElementById("5b").value;
        }else if(document.getElementById("5r").value != ""){
            ot5=document.getElementById("5r").value;
        }else if(document.getElementById("5d").value != ""){
            ot5=document.getElementById("5d").value;
        }
    }
    else if(tipo==1){
        ot5=valor;
        document.getElementById("5e").readOnly = false;
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5mb").value = "";
        document.getElementById("5b").readOnly = true;
        document.getElementById("5b").value = "";
        document.getElementById("5r").readOnly = true;
        document.getElementById("5r").value = "";
        document.getElementById("5d").readOnly = true;
        document.getElementById("5d").value = "";
    }
    else if(tipo==2){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5e").value = "";
        document.getElementById("5mb").readOnly =false;
        document.getElementById("5b").readOnly = true;
        document.getElementById("5b").value = "";
        document.getElementById("5r").readOnly = true;
        document.getElementById("5r").value = "";
        document.getElementById("5d").readOnly = true;
        document.getElementById("5d").value = "";
    }
    else if(tipo==3){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5e").value = "";
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5mb").value = "";
        document.getElementById("5b").readOnly = false;
        document.getElementById("5r").readOnly = true;
        document.getElementById("5r").value = "";
        document.getElementById("5d").readOnly = true;
        document.getElementById("5d").value = "";
    }
    else if(tipo==4){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5e").value = "";
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5mb").value = "";
        document.getElementById("5b").readOnly = true;
        document.getElementById("5b").value = "";
        document.getElementById("5r").readOnly = false;
        document.getElementById("5d").readOnly = true;
        document.getElementById("5d").value = "";
    }
    else if(tipo==5){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5e").value = "";
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5mb").value = "";
        document.getElementById("5b").readOnly = true;
        document.getElementById("5b").value = "";
        document.getElementById("5r").readOnly = true;
        document.getElementById("5r").value = "";
        document.getElementById("5d").readOnly = false;
    }
    if(!isNaN(parseFloat(document.getElementById("tiempoAsignado5").value))){
        t5=parseFloat(document.getElementById("tiempoAsignado5").value);
    }
    if(!isNaN(valor)){
        document.getElementById("5tc").value = toTrunc(((t5*ot5)/100),1);
    }
    calcular_promedio();   
}