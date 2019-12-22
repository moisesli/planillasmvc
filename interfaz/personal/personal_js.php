<script>
  var app = new Vue({
    el: '#app',
    data: {
      actividad: {
        id: "",
        codigo: "",
        nombre: ""
      },
      fuente: {
        id: "",
        codigo: "",
        nombre: "",
      },
      actividades: {},
      fuentes: {}
    },
    methods: {
      getActividades(){
        axios.get("./personal_controller.php?option=getactividades").then(res => {
          this.actividades = res.data;
          // console.log(res.data);
        })
      },
      getFuentes(){
        axios.get("./personal_controller.php?option=getfuentes").then(res => {
          this.fuentes = res.data;
          // console.log(res.data);
        })
      },
      openNewActividad(){
        this.actividad.id = "";
        this.actividad.codigo = "";
        this.actividad.nombre = "";
        $('#actividadModal').modal('show');
      },
      openNewfuente(){
        this.fuente = {}
        $('#fuenteModal').modal('show');
      },
      saveNewFuente(fuente){
        axios.post("./personal_controller.php?option=savefuentes", {fuente: this.fuente}).then(res =>{
          $('#fuenteModal').modal('hide');
          this.getFuentes();
          console.log(res.data)
        })
      },
      saveNewActividad(actividad){
        axios.post("./personal_controller.php?option=saveactividades", {actividad: this.actividad}).then(res =>{
          $('#actividadModal').modal('hide');
          this.getActividades();
            console.log(res.data)
        })
      },
      editOpenActividad(actividad){
          $('#actividadModal').modal('show');
          this.actividad.id = actividad.id;
          this.actividad.codigo = actividad.codigo;
          this.actividad.nombre = actividad.nombre;
          console.log(this.actividad.id)
      },
      editSaveActividad(){
        axios.post('./personal_controller.php?option=editsaveactividades',{actividad: this.actividad}).then(res => {
          this.getActividades();
          // $('#actividadModal').modal('hide');
          console.log(res.data)
        })
      }

    },
    mounted() {
      this.getActividades();
      this.getFuentes();
    }
  })
</script>