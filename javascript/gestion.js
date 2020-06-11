url = "../basedatos/peticionesClientes.php";
var appcliente = new Vue({
    el: "#appclientes",
    data: {
        clientes: [],
        tratamientos: [],
        precio: "",
        tratamiento: "",
        nombre: "",
        dni: "",
        email: "",
        telefono: "",
        valoracion: "",
        importe: "",
        total: 0,
        totalp: 0,
        buscar: "",
    },
    methods: {
        //para axios se pone async 
        add: async function () {
            if (document.getElementById('dni').checkValidity() && document.getElementById('email').checkValidity() && document.getElementById('telefono').checkValidity() && document.getElementById('nombre').checkValidity() ) {
                this.dni = document.getElementById('dni').value
                this.email = document.getElementById('email').value
                this.nombre = document.getElementById('nombre').value
                this.telefono = document.getElementById('telefono').value
                this.valoracion = document.getElementById('observaciones').value
                this.registrar();
            }
        },
        agregar: async function (dni) {
            this.tratamiento = document.getElementById('tratamientoA').value
            dni = document.getElementById('dniT').value
            this.importe = document.getElementById('importe').value
            this.precio = document.getElementById('precio').value
            var arrT = [this.tratamiento, dni, this.precio, this.importe]
            console.log(arrT);
            this.agregarTratamiento(dni);
        },
        eliminar: function (dni) {
            this.borrar(dni);
        },
        obtenerDNI: function (index) {
            var dni = this.clientes[index]['dni'];
            $("#dniG").text(dni);
        },
        borrarTratamiento: function (id, dni) {
            dni = $("#dniG").text();
            console.log(dni);
            this.eliminarT(id, dni);
        },
        editar: async function () {
            nombre = document.getElementById('nombreM').value,
                dni = document.getElementById('dniM').value,
                email = document.getElementById('emailM').value,
                telefono = document.getElementById('telefonoM').value,
                valoracion = document.getElementById('observacionesM').value
            var arrEditar = [nombre, dni, email, telefono, valoracion];
            console.log(arrEditar);
            this.modificar(nombre, dni, email, telefono, valoracion);
        },
        rellenarEditar: function (index) {
            document.getElementById('nombreM').value = this.clientes[index]['nombre'];
            document.getElementById('dniM').value = this.clientes[index]['dni'];
            document.getElementById('emailM').value = this.clientes[index]['email'];
            document.getElementById('telefonoM').value = this.clientes[index]['telefono'];
            document.getElementById('observacionesM').value = this.clientes[index]['valoracion'];
        },
        rellenarEditarTrat: function (index) {
            document.getElementById('importeM').value = this.tratamientos[index]['importe_pagado'];
            document.getElementById('precioM').value = this.tratamientos[index]['precio'];
            document.getElementById('tratamientoM').value = this.tratamientos[index]['tratamiento'];
            $("#idT").text(this.tratamientos[index]['id_tratamiento']);
        },
        rellenarDNI: function (index) {
            document.getElementById('dniT').value = this.clientes[index]['dni'];
        },
        editarTrat: function () {
            importe = document.getElementById('importeM').value
            id = $("#idT").text();
            this.modificarT(importe, id);
        },
        //conexiones con la base de datos
        mostrarClientes: function () {
            axios.post(url, {
                opcion: 1
            }).then(response => {
                this.clientes = response.data;

            });

        },
        mostrarTratamientos: function (dni) {
            axios.post(url, {
                opcion: 5,
                dni: dni
            }).then(response => {
                this.tratamientos = response.data;
                console.log(this.tratamientos);
            });
        },
        registrar: function () {
            axios.post(url, {
                opcion: 2,
                nombre: this.nombre,
                dni: this.dni,
                email: this.email,
                telefono: this.telefono,
                valoracion: this.valoracion
            }).then(response => {
                this.mostrarClientes();
                if (response.data != "") {
                    alert(response.data)
                }
            });

        },
        agregarTratamiento: function (dni) {
            axios.post(url, {
                opcion: 6,
                tratamiento: this.tratamiento,
                dni: dni,
                precio: this.precio,
                importe: this.importe
            }).then(response => {
                this.mostrarTratamientos();
                console.log(response.data)
            });

        },
        modificar: function (nombre, dni, email, telefono, valoracion) {
            axios.post(url, {
                opcion: 3,
                nombre: nombre,
                dni: dni,
                email: email,
                telefono: telefono,
                valoracion: valoracion
            }).then(response => {
                this.mostrarClientes();
            });
        },
        borrar: function (dni) {
            axios.post(url, {
                opcion: 4,
                dni: dni
            }).then(response => {
                console.log(response.data);
                this.mostrarClientes();
            });
        },
        eliminarT: function (id, dni) {
            axios.post(url, {
                opcion: 7,
                id_tratamiento: id
            }).then(response => {
                this.mostrarTratamientos(dni);
            });
        },
        modificarT: function (importe, id) {
            axios.post(url, {
                opcion: 8,
                importe: importe,
                id_tratamiento: id,
            }).then(response => {
                this.mostrarTratamientos();
                console.log(response.data)
            });
        },
    },
    //hace que lo haga nada mas iniciar la aplicacion
    mounted: function () {
        this.mostrarClientes();

    },
    computed: {
        ListaArray: function () {
            return this.clientes.filter(item => {
                return item.nombre.normalize('NFD').replace(/[\u00C0-\u00FF]/g, '').toLowerCase().indexOf(this.buscar.normalize('NFD').replace(/[\u00C0-\u00FF]/g, '').toLowerCase()) > -1
            })
        },
        totalPrecio() {
            this.total = 0;
            for (tratamiento of this.tratamientos) {
                this.total = this.total + parseInt(tratamiento.precio);
            }
            return this.total;
        },
        totalPagado() {
            this.totalp = 0;
            for (tratamiento of this.tratamientos) {
                this.totalp = this.totalp + parseInt(tratamiento.importe_pagado);
            }
            return this.totalp;
        }
    },

});