function cambio(facultad){
  if(facultad==""){facultad="Todas las facultades";}
  var cadena = "http://localhost/proyecto_chm/public/admin/depasporfacu/" + facultad;
  fetch(cadena)  // fetch se encarga de utilizar la API con URL 
  .then((respuesta) => {
  
      if(respuesta){
          return respuesta.json();
      }
      throw new Error('Something went wrong.');
  } ).then((respuesta) => {

      var filtro_d = document.getElementById("filtro_departamento"); // select

      borraOptions(filtro_d);
      insertarOptions(filtro_d, respuesta);
      
  }).catch(function(error) 
  {
  
  });
    
  }
  
  function borraOptions(elemSelect){
    n_options = elemSelect.length;

    for (let index = 0; index < n_options; index++) {
        elemSelect.remove(0);
    }
  }

  function insertarOptions(elemSelect, ConjuntoDeOptions){
    insertarUnOption(elemSelect, "Seleccionar Departamento","");
    insertarUnOption(elemSelect, "Todos los Departamentos","");
    elemSelect.options[0].disabled = true;
    
    for (let i = 0; i < ConjuntoDeOptions.length; i++) {
        insertarUnOption(elemSelect, ConjuntoDeOptions[i].nombre,ConjuntoDeOptions[i].nombre);
    }
    
  }

  function insertarUnOption(elemSelect, texto, value){
    var option = document.createElement("option");
    console.log(texto);
    option.text = texto;
    option.value= value;
    elemSelect.add(option);	
  }