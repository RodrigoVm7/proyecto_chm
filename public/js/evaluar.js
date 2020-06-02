var t1=0;
var ot1=0;
t1=parseFloat(t1);
ot1=parseFloat(ot1);

var t2=0;
var ot2=0;
t2=parseFloat(t2);
ot2=parseFloat(ot2);

var t3=0;
var ot3=0;
t3=parseFloat(t3);
ot3=parseFloat(ot3);

var t4=0;
var ot4=0;
t4=parseFloat(t4);
ot4=parseFloat(ot4);

var t5=0;
var ot5=0;
t5=parseFloat(t5);
ot5=parseFloat(ot5);

function toTrunc(value,n){
    var x=(value.toString()+".0").split(".");
    return parseFloat(x[0]+"."+x[1].substr(0,n));
}

function Mostrar_ocultar(id){
    var id=document.getElementById(id);
    if(id.style.display == "none"){
        id.style.display = "block";
    }else{
        id.style.display = "none";
    }
}

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
    }
    else if(tipo==1){
        ot1=valor;
        document.getElementById("1e").readOnly = false;
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1b").readOnly = true;
        document.getElementById("1r").readOnly = true;
        document.getElementById("1d").readOnly = true;
    }
    else if(tipo==2){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1mb").readOnly =false;
        document.getElementById("1b").readOnly = true;
        document.getElementById("1r").readOnly = true;
        document.getElementById("1d").readOnly = true;
    }
    else if(tipo==3){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1b").readOnly = false;
        document.getElementById("1r").readOnly = true;
        document.getElementById("1d").readOnly = true;
    }
    else if(tipo==4){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1b").readOnly = true;
        document.getElementById("1r").readOnly = false;
        document.getElementById("1d").readOnly = true;
    }
    else if(tipo==5){
        ot1=valor;
        document.getElementById("1e").readOnly = true;
        document.getElementById("1mb").readOnly =true;
        document.getElementById("1b").readOnly = true;
        document.getElementById("1r").readOnly = true;
        document.getElementById("1d").readOnly = false;
    }

    if(!isNaN(valor)){
        document.getElementById("1tc").value =toTrunc(((t1*ot1)/100),1);
    }

    calcular_promedio();
}

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
        ot2=0;
    }
    else if(tipo==1){
        ot2=valor;
        document.getElementById("2e").readOnly = false;
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2b").readOnly = true;
        document.getElementById("2r").readOnly = true;
        document.getElementById("2d").readOnly = true;
    }
    else if(tipo==2){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2mb").readOnly =false;
        document.getElementById("2b").readOnly = true;
        document.getElementById("2r").readOnly = true;
        document.getElementById("2d").readOnly = true;
    }
    else if(tipo==3){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2b").readOnly = false;
        document.getElementById("2r").readOnly = true;
        document.getElementById("2d").readOnly = true;
    }
    else if(tipo==4){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2b").readOnly = true;
        document.getElementById("2r").readOnly = false;
        document.getElementById("2d").readOnly = true;
    }
    else if(tipo==5){
        ot2=valor;
        document.getElementById("2e").readOnly = true;
        document.getElementById("2mb").readOnly =true;
        document.getElementById("2b").readOnly = true;
        document.getElementById("2r").readOnly = true;
        document.getElementById("2d").readOnly = false;
    }

    if(!isNaN(valor)){
        document.getElementById("2tc").value =toTrunc(((t2*ot2)/100),1);
    }
    calcular_promedio();
}

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
        ot3=0;
    }
    else if(tipo==1){
        ot3=valor;
        document.getElementById("3e").readOnly = false;
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3b").readOnly = true;
        document.getElementById("3r").readOnly = true;
        document.getElementById("3d").readOnly = true;
    }
    else if(tipo==2){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3mb").readOnly =false;
        document.getElementById("3b").readOnly = true;
        document.getElementById("3r").readOnly = true;
        document.getElementById("3d").readOnly = true;
    }
    else if(tipo==3){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3b").readOnly = false;
        document.getElementById("3r").readOnly = true;
        document.getElementById("3d").readOnly = true;
    }
    else if(tipo==4){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3b").readOnly = true;
        document.getElementById("3r").readOnly = false;
        document.getElementById("3d").readOnly = true;
    }
    else if(tipo==5){
        ot3=valor;
        document.getElementById("3e").readOnly = true;
        document.getElementById("3mb").readOnly =true;
        document.getElementById("3b").readOnly = true;
        document.getElementById("3r").readOnly = true;
        document.getElementById("3d").readOnly = false;
    }
    if(!isNaN(valor)){
        document.getElementById("3tc").value = toTrunc(((t3*ot3)/100),1);
    }
    calcular_promedio();
}

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
        ot4=0;
    }
    else if(tipo==1){
        ot4=valor;
        document.getElementById("4e").readOnly = false;
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4b").readOnly = true;
        document.getElementById("4r").readOnly = true;
        document.getElementById("4d").readOnly = true;
    }
    else if(tipo==2){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4mb").readOnly =false;
        document.getElementById("4b").readOnly = true;
        document.getElementById("4r").readOnly = true;
        document.getElementById("4d").readOnly = true;
    }
    else if(tipo==3){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4b").readOnly = false;
        document.getElementById("4r").readOnly = true;
        document.getElementById("4d").readOnly = true;
    }
    else if(tipo==4){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4b").readOnly = true;
        document.getElementById("4r").readOnly = false;
        document.getElementById("4d").readOnly = true;
    }
    else if(tipo==5){
        ot4=valor;
        document.getElementById("4e").readOnly = true;
        document.getElementById("4mb").readOnly =true;
        document.getElementById("4b").readOnly = true;
        document.getElementById("4r").readOnly = true;
        document.getElementById("4d").readOnly = false;
    }
    if(!isNaN(valor)){
        document.getElementById("4tc").value =toTrunc(((t4*ot4)/100),1);
    }
    calcular_promedio();
}

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
        ot5=0;
    }
    else if(tipo==1){
        ot5=valor;
        document.getElementById("5e").readOnly = false;
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5b").readOnly = true;
        document.getElementById("5r").readOnly = true;
        document.getElementById("5d").readOnly = true;
    }
    else if(tipo==2){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5mb").readOnly =false;
        document.getElementById("5b").readOnly = true;
        document.getElementById("5r").readOnly = true;
        document.getElementById("5d").readOnly = true;
    }
    else if(tipo==3){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5b").readOnly = false;
        document.getElementById("5r").readOnly = true;
        document.getElementById("5d").readOnly = true;
    }
    else if(tipo==4){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5b").readOnly = true;
        document.getElementById("5r").readOnly = false;
        document.getElementById("5d").readOnly = true;
    }
    else if(tipo==5){
        ot5=valor;
        document.getElementById("5e").readOnly = true;
        document.getElementById("5mb").readOnly =true;
        document.getElementById("5b").readOnly = true;
        document.getElementById("5r").readOnly = true;
        document.getElementById("5d").readOnly = false;
    }
    if(!isNaN(valor)){
        document.getElementById("5tc").value = toTrunc(((t5*ot5)/100),1);
    }
    calcular_promedio();   
}