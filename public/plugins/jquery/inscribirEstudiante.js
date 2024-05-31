
document.getElementById('parent_status').addEventListener('change', function() {
    var parentStatus = this.value;
    if (parentStatus === 'yes') {
        document.getElementById('parent-details').style.display = 'none';
        document.getElementById('ci-check').style.display = 'block'; // Habilitar ci-check
        disableParentFields();
    } else {
        document.getElementById('parent-details').style.display = 'block';
        document.getElementById('ci-check').style.display = 'none'; // Deshabilitar ci-check
        document.getElementById('consulta').style.display = 'none'; // Deshabilitar consulta

        enableParentFields();
    }
});

document.getElementById('checkParent').addEventListener('click', function() {
    const ciPF = document.getElementById('ciPF_check').value;
    if (ciPF) {
        fetch(`/api/check-parent/${ciPF}`)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    document.getElementById('parent-details').style.display = 'none';
                    document.getElementById('ci-error').style.display = 'none';

                    // Vincular el ID del padre al formulario del estudiante
                    document.getElementById('parent_id').value = data.parent.id;

                    // Deshabilitar campos de registro del padre
                    disableParentFields();

                    // Mostrar mensaje de que el padre está vinculado correctamente
                    alert('El padre ha sido vinculado correctamente.');
                } else {
                    document.getElementById('parent-details').style.display = 'block';
                    document.getElementById('ci-error').style.display = 'none';

                    // Habilitar campos de registro del padre
                    enableParentFields();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('ci-error').style.display = 'block';
            });
    } else {
        document.getElementById('ci-error').style.display = 'block';
    }
});

function disableParentFields() {
    const fields = ['namePadres', 'apellidoPaternoPF', 'apellidoMaternoPF', 'fechaNacimientoPF', 'telefonoPF',
        'sexoPF', 'emailPF', 'ocupacionLaboral', 'gradoInstruccion', 'tipo'
    ];
    fields.forEach(field => {
        const element = document.getElementById(field);
        if (element) {
            element.disabled = true;
        }
    });
}

function enableParentFields() {
    const fields = ['namePadres', 'apellidoPaternoPF', 'apellidoMaternoPF', 'fechaNacimientoPF', 'telefonoPF',
        'sexoPF', 'emailPF', 'ocupacionLaboral', 'gradoInstruccion', 'tipo'
    ];
    fields.forEach(field => {
        document.getElementById(field).disabled = false;
    });
}
