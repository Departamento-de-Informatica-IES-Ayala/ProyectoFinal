url = "../basedatos/peticionesCitasHoy.php";
var appcliente = new Vue({
    el: "#appcitas",
    data: {
        citas: [],
        nombre: "",
        dni: "",
        email: "",
        telefono: "",
        valoracion: "",
        hora:"",
        dia:""
    },
    methods: {
        //para axios se pone async 
        agregar:async function (dni) {
            this.hora = document.getElementById('horaC').value
            dni = document.getElementById('dni').value
            var arrT=[this.hora,dni]
            console.log(arrT);
            this.agregarCita(dni);
        },
        borrarCita:function(index){
            idcita= this.citas[index]['id_citas'];
            console.log(idcita);
            this.elimitarC(idcita);
        },
        //conexiones con la base de datos
        mostrarCitas: function () {
            axios.post(url, {
                opcion: 1
            }).then(response => {
                this.citas = response.data;
                console.log(response.data);
            });

        },
        agregarCita: function (dni) {
            axios.post(url, {
                opcion: 2,
                hora: this.hora,
                dni: dni,
            }).then(response => {
                this.mostrarCitas();
                console.log(response.data)
                if (response.data != "") {
                    alert(response.data)
                }
            });

        },
        elimitarC: function (idcita) {
            axios.post(url, {
                opcion: 3,
                idcita: idcita
            }).then(response => {
                this.mostrarCitas();
            });
        }
    },
    //hace que lo haga nada mas iniciar la aplicacion
    mounted: function () {
        this.mostrarCitas();
    },
    computed: {
    },

});