url = "../basedatos/peticionesAgenda.php";
var appcliente = new Vue({
    el: "#appcitas",
    data: {
        citas: [],
        citasdatos: [],
        nombre: "",
        dni: "",
        email: "",
        telefono: "",
        valoracion: "",
        hora: "",
        dia: "",
        buscar: ""
    },
    methods: {
        //para axios se pone async 
        agregar: async function (dni) {
            if (document.getElementById('dni').checkValidity() && document.getElementById('dia').checkValidity() && document.getElementById('horaC').checkValidity()) {
                this.hora = document.getElementById('horaC').value
                dni = document.getElementById('dni').value
                this.dia = document.getElementById('dia').value
                var arrT = [this.hora, dni, this.dia]
                console.log(arrT);
                this.agregarCita(dni);
            }
        },
        borrarCita: function (index) {
            idcita = this.citasdatos[index]['id_citas'];
            dia = this.citasdatos[index]['dia'];
            console.log(idcita);
            this.elimitarC(idcita, dia);
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
                dia: this.dia
            }).then(response => {
                this.mostrarCitas();
                console.log(response.data)
                if (response.data != "") {
                    alert(response.data)
                }
            });

        },
        elimitarC: function (idcita, dia) {
            axios.post(url, {
                opcion: 3,
                idcita: idcita
            }).then(response => {
                this.mostrarCitas();
                this.cargarcitas(dia);
            });
        },
        cargarcitas: function (dia) {
            axios.post(url, {
                opcion: 4,
                dia: dia
            }).then(response => {
                this.citasdatos = response.data;
                console.log(this.citasdatos);
            });
        },
    },
    //hace que lo haga nada mas iniciar la aplicacion
    mounted: function () {
        this.mostrarCitas();
    },
    computed: {
        ListaArray: function () {
            return this.citas.filter(item => {
                return item.dia.indexOf(this.buscar) > -1
            })
        }
    },

});