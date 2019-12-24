<script>
  Vue.filter('truncate', function (text, length) {
    return text.substring(0, length);
  });

  Vue.filter('digito', function (num) {
    var t = Math.pow(10, 2);
    return (Math.round((num * t) + (2>0?1:0)*(Math.sign(num) * (10 / Math.pow(100, 2)))) / t).toFixed(2);
  });

  var app = new Vue({
    el: '#app',
    data: {
      nombre: 'moises',
      creacion: <?php echo $creacion_tabla; ?>,
      planillas: <?php echo $planillas_json; ?>,
      array_fuentes: <?php echo $array_fuentes ?>,
      array_actividades: <?php echo $array_actividades ?>,
      descuentos_retenciones: <?php echo $descuentos_retenciones ?>,
      fuente: "",
      actividad: ""
    },
    methods: {
      filtrar_fuente() {
        console.log('filtro fuente')
      },
      filtrar_actividad() {
        console.log('filtro actividad')
      }
    },
    computed: {
      filtrarPlanillas: function() {
        return this.planillas.filter( (planilla) => {
          return planilla.fuente_id.match(this.fuente) && planilla.actividad_id.match(this.actividad)
        });
      },
      ingresosTotalesArray: function () {
        let ingresos = [];
        this.filtrarPlanillas.forEach(planilla => {
          let i=0;
          planilla.ingresos.forEach(ingreso => {
            if (typeof ingresos[i] === 'undefined'){
              ingresos[i] = 0;
            }
            ingresos[i] += parseFloat(ingreso.ingreso);
            i++;
          });
        });
        return ingresos;
      },
      ingresosOtrosTotales: function () {
        let total_antes = 0;
        this.ingresosTotalesArray.forEach(ingreso => {
          total_antes += ingreso;
        })
        return this.ingresosTotal - total_antes ;
      },
      ingresosTotal: function () {
        let total = 0;
        this.filtrarPlanillas.forEach(planilla => {
          total += planilla.ingresos_linea_total;
        });
        return total;
      },
      descuentosArrayTotal: function () {
        let descuentos = [];
        descuentos[0] = 0;
        descuentos[1] = 0;
        descuentos[2] = 0;
        descuentos[3] = 0;
        this.filtrarPlanillas.forEach(planilla => {
          descuentos[0] += parseFloat(planilla.afp1);
          descuentos[1] += parseFloat(planilla.afp2);
          descuentos[2] += parseFloat(planilla.afp3);
          descuentos[3] += parseFloat(planilla.onp);
        });
        return descuentos;
      },
      descuentosOtrosTotal: function(){
        let descuentos_otros = 0;
        this.filtrarPlanillas.forEach(planilla => {
          descuentos_otros += planilla.descuento_lineal_otros;
        });
        return descuentos_otros;
      },
      descuentosTotal: function () {
        let descuento_total = 0;
        this.filtrarPlanillas.forEach(planilla => {
          descuento_total += planilla.descuento_lineal_total;
        });
        return descuento_total;
      },
      neto_total: function () {
        return this.ingresosTotal - this.descuentosTotal;
      },
      aportes_uno_total: function () {
        let aporte = 0;
        this.filtrarPlanillas.forEach(planilla => {
          aporte += parseFloat(planilla.essalud); // scrtsalud scrtpension
        });
        return aporte;
      },
      aportes_dos_total: function () {
        let aporte = 0;
        this.filtrarPlanillas.forEach(planilla => {
          aporte += parseFloat(planilla.scrtsalud); // scrtsalud scrtpension
        });
        return aporte;
      },
      aportes_tres_total: function () {
        let aporte = 0;
        this.filtrarPlanillas.forEach(planilla => {
          aporte += parseFloat(planilla.scrtpension); // scrtsalud scrtpension
        });
        return aporte;
      },
      array_descuento_retenciones: function () {
        var descuento_retenciones = [
          { nombre: this.creacion.afp1, monto: 0 },
          { nombre: this.creacion.afp2, monto: 0 },
          { nombre: this.creacion.afp3, monto: 0 },
          { nombre: this.creacion.onp, monto: 0 },
          { nombre: this.creacion.essalud, monto: 0 },
          { nombre: this.creacion.senati, monto: 0 },
          { nombre: this.creacion.scrtsalud, monto: 0 },
          { nombre: this.creacion.scrtpension, monto: 0 },
          { nombre: this.creacion.ies, monto: 0 },
          { nombre: this.creacion.ipssvida, monto: 0 },
          { nombre: this.creacion.quinta, monto: 0 },
          { nombre: this.creacion.descuento1, monto: 0 },
          { nombre: this.creacion.descuento2, monto: 0 },
          { nombre: this.creacion.descuento3, monto: 0 },
          { nombre: this.creacion.descuento4, monto: 0 },
          { nombre: this.creacion.descuento5, monto: 0 },
          { nombre: this.creacion.descuento6, monto: 0 },
          { nombre: this.creacion.descuento7, monto: 0 },
          { nombre: this.creacion.descuento8, monto: 0 },
          { nombre: this.creacion.descuento9, monto: 0 },
          { nombre: this.creacion.descuento10, monto: 0 },
          { nombre: this.creacion.descuento11, monto: 0 },
          { nombre: this.creacion.descuento12, monto: 0 },
          { nombre: this.creacion.descuento13, monto: 0 },
          { nombre: this.creacion.descuento14, monto: 0 },
          { nombre: this.creacion.descuento15, monto: 0 },
          { nombre: this.creacion.descuento16, monto: 0 },
          { nombre: this.creacion.descuento17, monto: 0 },
        ];
        descuento_retenciones[0].monto = 5;
        this.filtrarPlanillas.forEach(planilla => {
          let i = 0;
          descuento_retenciones[i].monto += parseFloat(planilla.afp1); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.afp2); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.afp3); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.onp); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.essalud); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.senati); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.scrtsalud); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.scrtpension); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.ies); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.ipssvida); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.quinta); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento1); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento2); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento3); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento4); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento5); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento6); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento7); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento8); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento9); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento10); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento11); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento12); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento13); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento14); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento15); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento16); i++;
          descuento_retenciones[i].monto += parseFloat(planilla.descuento17); i++;
        });
        return descuento_retenciones;
      },
      conceptos_remunerativos_array: function () {
        var conceptos_remunerativos = [
          { nombre: this.creacion.essalud, monto: 0},
          { nombre: this.creacion.scrtsalud, monto: 0},
          { nombre: this.creacion.scrtpension, monto: 0},
          { nombre: this.creacion.ingreso1, monto: 0},
          { nombre: this.creacion.ingreso2, monto: 0},
          { nombre: this.creacion.ingreso3, monto: 0},
          { nombre: this.creacion.ingreso4, monto: 0},
          { nombre: this.creacion.ingreso5, monto: 0},
          { nombre: this.creacion.ingreso6, monto: 0},
          { nombre: this.creacion.ingreso7, monto: 0},
          { nombre: this.creacion.ingreso8, monto: 0},
          { nombre: this.creacion.ingreso9, monto: 0},
          { nombre: this.creacion.ingreso10, monto: 0},
          { nombre: this.creacion.ingreso11, monto: 0},
          { nombre: this.creacion.ingreso12, monto: 0},
          { nombre: this.creacion.ingreso13, monto: 0},
          { nombre: this.creacion.ingreso14, monto: 0},
          { nombre: this.creacion.ingreso15, monto: 0},
          { nombre: this.creacion.ingreso16, monto: 0},
          { nombre: this.creacion.ingreso17, monto: 0},
          { nombre: this.creacion.ingreso18, monto: 0},
          { nombre: this.creacion.ingreso19, monto: 0},
          { nombre: this.creacion.ingreso20, monto: 0},
          { nombre: this.creacion.ingreso21, monto: 0},
          { nombre: this.creacion.ingreso22, monto: 0},
          { nombre: this.creacion.ingreso23, monto: 0},
          { nombre: this.creacion.ingreso24, monto: 0},
        ];
        this.filtrarPlanillas.forEach(planilla => {
          let i=0;
          conceptos_remunerativos[i].monto += parseFloat(planilla.essalud); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.scrtsalud); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.scrtpension); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso1); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso2); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso3); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso4); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso5); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso6); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso7); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso8); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso9); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso10); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso11); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso12); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso13); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso14); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso15); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso16); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso17); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso18); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso19); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso20); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso21); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso22); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso23); i++;
          conceptos_remunerativos[i].monto += parseFloat(planilla.ingreso24); i++;
        });
        return conceptos_remunerativos;
      },
      conceptos_remunerativos_total: function () {
        let total = 0;
        this.conceptos_remunerativos_array.forEach(concepto => {
          total += concepto.monto;
        })
        return total;
      },
      afectacion_presupuestal_array: function () {
        var afectacion = [
          {fuente: '18',    partida: '2.1.3.1.1.5', concepto: this.creacion.essalud,   monto: this.aportes_uno_total},
          {fuente: '18',    partida: '213116/2',    concepto: '',                      monto: this.aportes_dos_total + this.aportes_tres_total},
          {fuente: '18',    partida: '2.1.1.8.1.1', concepto: 'OBREROS PERMANENTES',   monto: this.ingresosTotal}
        ]
        return afectacion;
      },
      aportes_array_total: function () {
        var aportes = [
          {afp: 'INTEGRA', monto: 0, comision: 0, total: 0},
          {afp: 'PRIMA', monto: 0, comision: 0, total: 0},
          {afp: 'PROFUTURO', monto: 0, comision: 0, total: 0},
          {afp: 'HABITAD', monto: 0, comision: 0, total: 0},
          {afp: 'HORIZONTE', monto: 0, comision: 0, total: 0},
          {afp: 'OTRO', monto: 0, comision: 0, total: 0}
        ];
        this.filtrarPlanillas.forEach(planilla => {
          if (planilla.trabajador_afp == "INTEGRA"){
            aportes[0].monto += parseFloat(planilla.afp1);
            aportes[0].comision +=  parseFloat(planilla.afp2) + parseFloat(planilla.afp3);
            aportes[0].total += aportes[0].monto + aportes[0].comision;
          } else if (planilla.trabajador_afp == "PRIMA"){
            aportes[1].monto += parseFloat(planilla.afp1);
            aportes[1].comision += parseFloat(planilla.afp2) + parseFloat(planilla.afp3);
            aportes[1].total += aportes[0].monto + aportes[0].comision;
          } else if (planilla.trabajador_afp == "PROFUTURO"){
            aportes[2].monto += parseFloat(planilla.afp1);
            aportes[2].comision += parseFloat(planilla.afp2) + parseFloat(planilla.afp3);
            aportes[2].total += aportes[0].monto + aportes[0].comision;
          } else if (planilla.trabajador_afp == "HABITAD"){
            aportes[3].monto += parseFloat(planilla.afp1);
            aportes[3].comision += parseFloat(planilla.afp2) + parseFloat(planilla.afp3);
            aportes[3].total += aportes[0].monto + aportes[0].comision;
          } else if (planilla.trabajador_afp == "HORIZONTE"){
            aportes[4].monto += parseFloat(planilla.afp1);
            aportes[4].comision += parseFloat(planilla.afp2) + parseFloat(planilla.afp3);
            aportes[4].total += aportes[0].monto + aportes[0].comision;
          } else if (planilla.trabajador_afp == "HORIZONTE"){
            aportes[5].monto += parseFloat(planilla.afp1);
            aportes[5].comision += parseFloat(planilla.afp2) + parseFloat(planilla.afp3);
            aportes[5].total += aportes[0].monto + aportes[0].comision;
          }
        });
        return aportes;
      },

    },
    mounted() {
      console.log(this.planillas)
      console.log(this.aportes_array_total)
      // console.log(this.redondear(14.5644));
      // console.log(this.array_actividades);
    }
  })
</script>