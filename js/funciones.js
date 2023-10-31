// Función para mostrar la imagen seleccionada en un campo de archivo de entrada
function showImg(event) {
  const fileInput = event.target; // Obtener el campo de archivo de entrada
  const imagePreview = document.getElementById("imagePreview"); // Obtener el elemento de vista previa de la imagen
 
  if (fileInput.files && fileInput.files[0]) {
    // Si se selecciona un archivo
    const reader = new FileReader();
    reader.onload = function (e) {
      imagePreview.src = e.target.result; // Mostrar la imagen seleccionada en la vista previa
    };

    reader.readAsDataURL(fileInput.files[0]); // Leer el contenido del archivo seleccionado
  } else {
    // Si no se selecciona un archivo, mostrar la imagen predeterminada
    console.log("errors");
    imagePreview.src = `./pictures/<?php echo is_file("../pictures/user_".$us_id) ? "user_".$us_id : "usuario.jpg" ?>`;
  }

  if(fileInput.id = "photo_clase"){
    
    document.getElementById("photoForm").submit();
  }
}

//Mensaje de Errores y succes
function Msj() {
  const msj = document.getElementById("msj");

  if (msj) {
    //msj.classList.add("bottom-0");
    //msj.classList.remove("bottom-8");
    setTimeout(() => {
      msj.classList.remove("bottom-8");
      msj.classList.add("bottom-0");
    }, 1);
    setTimeout(() => {
      msj.remove();
    }, 10000);
  }
}
Msj();

//funciones de Administrador
function delaySubmitForm(event) {
  console.log(event);

  // Muestra la pantalla de carga
  var loadingScreen = document.createElement("iframe");
  loadingScreen.src = "loading.php";
  loadingScreen.id = "loading";
  loadingScreen.style.position = "fixed";
  loadingScreen.style.top = "0";
  loadingScreen.style.left = "0";
  loadingScreen.style.width = "100vw";
  loadingScreen.style.height = "100vh";
  loadingScreen.style.background = "#8c8be673";
  document.body.appendChild(loadingScreen);
}


function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  if (section) {
    const sectionTop = section.offsetTop;
    window.scrollTo({
      top: sectionTop - 80, // Ajusta este valor según la altura de tu barra de navegación
      behavior: 'smooth'
    });
  }
}

       
function toggleDarkMode() {


  const darkModePreference = sessionStorage.getItem('darkMode');

    if (darkModePreference === 'enabled') {
        document.querySelector('html').classList.remove('dark');
        sessionStorage.setItem('darkMode', 'disabled');
    } else {
        document.querySelector('html').classList.add('dark');
        sessionStorage.setItem('darkMode', 'enabled');
    }
}


function EditarPermisos(id) {
  // Realizar una solicitud AJAX
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "../model/R_permisos.php?id=" + id, true);
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const userData = JSON.parse(xhr.responseText);
      if (userData.error) {
        console.error(userData.error);
      } else {
        console.log(userData.data.us_status == 1);

        const modal = document.getElementById("modalpermiso");
        modal.id.value = userData.data.us_id;
        modal.email.value = userData.data.us_email;
        modal.permiso.value = userData.data.us_permiso;
        modal.status.checked = userData.data.us_status == 1;
      }
    }
  };
}

function EditarMaestros(id, m_id, m_nombre,img) {
  // Realizar una solicitud AJAX
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "../model/R_maestros.php?id=" + id, true);
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const userData = JSON.parse(xhr.responseText);
      if (userData.error) {
        console.error(userData.error);
      } else {

        
        document.getElementById("imagemodal").src = "../pictures/" + (img ? "user_" + userData.data.us_id : "usuario.jpg");
        document.getElementById("titulo").textContent = "Modificar Maestro"
        
        
        const modal = document.getElementById("modalmaestro");
        modal.accion.value = "update";
        modal.id.value = userData.data.us_id;
        modal.email.value = userData.data.us_email;
        modal.name.value = userData.data.us_name;
        modal.lastname.value = userData.data.us_lastname;
        modal.addres.value = userData.data.us_addres;
        modal.birth.value = userData.data.us_birth;
        
        const materiasContainer = document.getElementById("materias");
        let labels = "";
        const materias_Array = m_nombre.split(", ");
        const materias_id_Array = m_id.split(", ");

        materias_Array.forEach((elemento, index) => {
          labels += `<label>
                            <input checked type="checkbox" name="item[]" value="${materias_id_Array[index]}" class="" c>${elemento}
                        </label>`;
        });

        materiasContainer.innerHTML = labels;
      }
    }
  };
}

function EditarAlumnos(id, img) {
  // Realizar una solicitud AJAX
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "../model/R_alumnos.php?id=" + id, true);
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const userData = JSON.parse(xhr.responseText);
      if (userData.error) {
        console.error(userData.error);
      } else {

        document.getElementById("imagemodal").src = "../pictures/" + (img ? "user_" + userData.data.us_id : "usuario.jpg");
        document.getElementById("titulo").innerText = "Modificar Alumno"

        const modal = document.getElementById("alumnoForm");
        modal.accion.value = "update";
        modal.id.value = userData.data.us_id;
        modal.dni.value = userData.data.us_dni;
        modal.email.value = userData.data.us_email;
        modal.name.value = userData.data.us_name;
        modal.lastname.value = userData.data.us_lastname;
        modal.addres.value = userData.data.us_addres;
        modal.birth.value = userData.data.us_birth;
      }
    }
  };
}

function EditarClases(id,img) {
  // Realizar una solicitud AJAX
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "../model/R_clases.php?id=" + id, true);
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const userData = JSON.parse(xhr.responseText);
      if (userData.error) {
        console.error(userData.error);
      } else {

        document.getElementById("imagemodal").src = "../pictures/" + (img ? "clase_" + userData.data.ma_id : "school.svg");
        document.getElementById("titulo").textContent = "Modificar Clase"

        const modal = document.getElementById("modalclase");
        modal.accion.value = "update";
        modal.id.value = userData.data.ma_id;
        modal.nombre.value = userData.data.ma_nombre;
        modal.profesor.value = userData.data.ma_profesor;
      }
    }
  };
}


function EditarCalificacion(id) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "../model/R_clases_calificacion.php?id=" + id, true);
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const userData = JSON.parse(xhr.responseText);
      if (userData.error) {
        console.error(userData.error);
      } else {
        console.log(userData.data);
        const modal = document.getElementById("calificacionModal");

        modal.id.value = userData.data.se_id;
        modal.nombre.value = userData.data.us_name;
        modal.calificacion.value = userData.data.se_nota;
        modal.mensaje.value = userData.data.se_mensaje;
      }
    }
  };
}

function RetirarMateria(id) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "../model/R_alumno_retiro.php?id=" + id, true);
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const userData = JSON.parse(xhr.responseText);
      if (userData.error) {
        console.error(userData.error);
      } else {
        document.getElementById("materia_id").value = userData.data.se_id;
        document.getElementById("materia_name").innerText = userData.data.ma_nombre;
      }
    }
  };
}

function Eliminar(data) {

  console.log(data);
  const formulario = document.getElementById("modalDelete");
  formulario.action = "../controller/" + data.controller; 
  formulario.accion.value = "delete"; 
  formulario.id.value = data.id; 
  formulario.boton.textContent = data.msj.split(" ")[0].toUpperCase();
  document.getElementById("mensaje").textContent = data.msj;
             
}; 

