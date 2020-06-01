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
    x=(value.toString()+".0").split(".");
    return parseFloat(x[0]+"."+x[1].substr(0,n));
}

function Mostrar_ocultar(id){
    var id=document.getElementById(id);
    /*var id=document.getElementById("ident");*/
    if(id.style.display == "none"){
        id.style.display = "block";
    }else{
        id.style.display = "none";
    }
}

function prom1(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("1e").readOnly = false; 
        document.getElementById("1mb").readOnly = false;
        document.getElementById("1b").readOnly = false;
        document.getElementById("1r").readOnly = false;
        document.getElementById("1d").readOnly = false;
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

    document.getElementById("1tc").value =toTrunc(((t1*ot1)/100),2);

    if((document.getElementById("1tc") != null) && (document.getElementById("2tc")!= null) && (document.getElementById("3tc") != null) && (document.getElementById("4tc") != null) && (document.getElementById("5tc") != null)){
        var nota = parseFloat(document.getElementById("1tc").value) + parseFloat(document.getElementById("2tc").value)+parseFloat(document.getElementById("3tc").value)+parseFloat(document.getElementById("4tc").value)+parseFloat(document.getElementById("5tc").value);
        if(isNaN(nota)){
            document.getElementById("nota").value = " "
            
        }
        else{
            document.getElementById("nota").value = toTrunc(nota,2);
            
        }
    }   
    
    
}

function prom2(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("2e").readOnly = false; 
        document.getElementById("2mb").readOnly = false;
        document.getElementById("2b").readOnly = false;
        document.getElementById("2r").readOnly = false;
        document.getElementById("2d").readOnly = false;
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

    document.getElementById("2tc").value =toTrunc(((t2*ot2)/100),2);
    if((document.getElementById("1tc") != null) && (document.getElementById("2tc")!= null) && (document.getElementById("3tc") != null) && (document.getElementById("4tc") != null) && (document.getElementById("5tc") != null)){
        var nota = parseFloat(document.getElementById("1tc").value) + parseFloat(document.getElementById("2tc").value)+parseFloat(document.getElementById("3tc").value)+parseFloat(document.getElementById("4tc").value)+parseFloat(document.getElementById("5tc").value);
        if(isNaN(nota)){
            document.getElementById("nota").value = " "
            
        }
        else{
            document.getElementById("nota").value = toTrunc(nota,2);
            
        }
    }   
   
}

function prom3(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("3e").readOnly = false; 
        document.getElementById("3mb").readOnly = false;
        document.getElementById("3b").readOnly = false;
        document.getElementById("3r").readOnly = false;
        document.getElementById("3d").readOnly = false;
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

    document.getElementById("3tc").value =toTrunc(((t3*ot3)/100),2);
    if((document.getElementById("1tc") != null) && (document.getElementById("2tc")!= null) && (document.getElementById("3tc") != null) && (document.getElementById("4tc") != null) && (document.getElementById("5tc") != null)){
        var nota = parseFloat(document.getElementById("1tc").value) + parseFloat(document.getElementById("2tc").value)+parseFloat(document.getElementById("3tc").value)+parseFloat(document.getElementById("4tc").value)+parseFloat(document.getElementById("5tc").value);
        if(isNaN(nota)){
            document.getElementById("nota").value = " "
            
        }
        else{
            document.getElementById("nota").value = toTrunc(nota,2);
            
        }
    }   
    
}

function prom4(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("4e").readOnly = false; 
        document.getElementById("4mb").readOnly = false;
        document.getElementById("4b").readOnly = false;
        document.getElementById("4r").readOnly = false;
        document.getElementById("4d").readOnly = false;
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

    document.getElementById("4tc").value =toTrunc(((t4*ot4)/100),2);
    if((document.getElementById("1tc") != null) && (document.getElementById("2tc")!= null) && (document.getElementById("3tc") != null) && (document.getElementById("4tc") != null) && (document.getElementById("5tc") != null)){
        var nota = parseFloat(document.getElementById("1tc").value) + parseFloat(document.getElementById("2tc").value)+parseFloat(document.getElementById("3tc").value)+parseFloat(document.getElementById("4tc").value)+parseFloat(document.getElementById("5tc").value);
        if(isNaN(nota)){
            document.getElementById("nota").value = " "
            
        }
        else{
            document.getElementById("nota").value = toTrunc(nota,2);
            
        }
    }   
    
}

function prom5(valor,tipo){
    valor=parseFloat(valor);
    
    if(isNaN(valor)){
        document.getElementById("5e").readOnly = false; 
        document.getElementById("5mb").readOnly = false;
        document.getElementById("5b").readOnly = false;
        document.getElementById("5r").readOnly = false;
        document.getElementById("5d").readOnly = false;
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

    document.getElementById("5tc").value = toTrunc(((t5*ot5)/100),2);
    if((document.getElementById("1tc") != null) && (document.getElementById("2tc")!= null) && (document.getElementById("3tc") != null) && (document.getElementById("4tc") != null) && (document.getElementById("5tc") != null)){
        var nota = parseFloat(document.getElementById("1tc").value) + parseFloat(document.getElementById("2tc").value)+parseFloat(document.getElementById("3tc").value)+parseFloat(document.getElementById("4tc").value)+parseFloat(document.getElementById("5tc").value);
        if(isNaN(nota)){
            document.getElementById("nota").value = " "
            
        }
        else{
            document.getElementById("nota").value = toTrunc(nota,2);
            
        }
    }   
   
}