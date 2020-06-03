url = "../basedatos/peticionesClientes.php";
var appcliente = new Vue({
    el: "#appclientes",
    data: {
        clientes: [],
        nombre: "",
        dni: "",
        email: "",
        telefono: "",
        valoracion: "",
        total: 0,
    },
    methods: {
        //para axios se pone async 
        add: async function () {
            arr[this.nombre = document.getElementById('nombreR').value,
                this.dni = document.getElementById('dniR').value,
                this.email = document.getElementById('emailR').value,
                this.telefono = document.getElementById('telefonoR').value,
                this.valoracion = document.getElementById('observacionesR').value]
            if (arr.lenght != 0) {
                this.registrar();
                return arr;
            }
        },
        eliminar: function (dni) {
            this.borrar(dni);
        },
        editar: async function (nombre, dni, email, telefono, valoracion) {
            arrEditar[nombre = document.getElementById('nombreM').value,
                email = document.getElementById('emailM').value,
                telefono = document.getElementById('telefonoM').value,
                valoracion = document.getElementById('observacionesM').value
            ]
            if (arr.lenght != 0) {
                this.modificar(nombre, dni, email, telefono, valoracion);
            }
        },
        //conexiones con la base de datos
        mostrarClientes: function() {
            axios.post(url, {
                opcion:1
            }).then(response =>{
                this.clientes = response.data;
                console.log(this.clientes);
            });

        },
    },
    //hace que lo haga nada mas iniciar la aplicacion
    created: function () {
        this.mostrarClientes();
    },
    computed: {

    },

});