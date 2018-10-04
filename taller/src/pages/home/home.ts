import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ActualizarPage } from '../actualizar/actualizar';
import { CrearPage } from '../crear/crear';
import { EliminarPage } from '../eliminar/eliminar';
import { MostrarPage } from '../mostrar/mostrar';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(public navCtrl: NavController) {

  }

  irCrearPage(){
    this.navCtrl.push(CrearPage);
  }

  irMostrarPage(){
    this.navCtrl.push(MostrarPage);
  }

  irActualizarPage(){
    this.navCtrl.push(ActualizarPage);
  }

  irEliminarPage(){
    this.navCtrl.push(EliminarPage);
  }
}
