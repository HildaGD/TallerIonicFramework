import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {ConexionProvider} from '../../providers/conexion/conexion';

/**
 * Generated class for the CrearPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-crear',
  templateUrl: 'crear.html',
})
export class CrearPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, private service:ConexionProvider) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad CrearPage');
  }

  sendData(req){
    console.log(req.value);
     
     this.service.guardarDatos(req.value)
       .subscribe(
       datos => {
         //this.showAlert(datos.mensaje);
         console.log(datos.mensaje)
       },
       err => console.log(err)
       );
   }

}
