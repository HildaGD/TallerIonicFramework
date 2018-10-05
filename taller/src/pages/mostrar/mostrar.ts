import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {ConexionProvider} from '../../providers/conexion/conexion';

/**
 * Generated class for the MostrarPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-mostrar',
  templateUrl: 'mostrar.html',
})
export class MostrarPage {

  users:any[];


  constructor(public navCtrl: NavController,
     public navParams: NavParams,
    public service: ConexionProvider) {
      this.mostrarDatos();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MostrarPage');
  }

  mostrarDatos(){
    this.service.mostrarDatos().subscribe(
      data=> this.users = data,
      err => console.log(err)
    );
  }
}
