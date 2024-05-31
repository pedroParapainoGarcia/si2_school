$(document).ready(function() {
    $('#roleSelect').change(function() {
        var selectedRole = $(this).val();
        
        // Resto del código para mostrar u ocultar inputs según el rol seleccionado
        if (selectedRole === '1') { // Si el rol seleccionado es '1' (admin)
            $('#adminCargo').show(); // Mostrar el input para el cargo del administrador
            $('#idColegio').show();            
            $('#idEspecialidad').hide();             
            $('#estudianteRude').hide(); // Ocultar el input para el nro_rude del estudiante  
            $('#idParentesco').hide();       
        }else if(selectedRole === '2'){
            $('#adminCargo').hide(); // Mostrar el input para el cargo del administrador
            $('#idColegio').hide();
            $('#idEspecialidad').show();             
            $('#estudianteRude').hide(); // Ocultar el input para el nro_rude del estudiante           
            $('#idParentesco').hide(); 
        }else if(selectedRole === '3'){
            $('#adminCargo').hide(); // Mostrar el input para el cargo del administrador
            $('#idColegio').hide();
            $('#idEspecialidad').hide();             
            $('#estudianteRude').hide(); // Ocultar el input para el nro_rude del estudiante           
            $('#idParentesco').show(); 
        } else if (selectedRole === '4') { // Si el rol seleccionado es '4' (estudiante)
            $('#adminCargo').hide(); // Ocultar el input para el cargo del administrador
            $('#idColegio').hide();           
            $('#idEspecialidad').hide();              
            $('#estudianteRude').show(); // Mostrar el input para el nro_rude del estudiante
            $('#idParentesco').hide(); 
        } else {
            // Si se selecciona otro rol, ocultar todos los inputs adicionales
            $('#adminCargo').show();
            $('#idColegio').show();
            $('#idEspecialidad').hide();            
            $('#idParalelo').hide();  
            $('#estudianteRude').hide();
            // $('#idGrupo').hide();
        }
    });
});
