import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import {ConexionProvider}  from '../../providers/conexion/conexion';

/**
 * Generated class for the EliminarPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-eliminar',
  templateUrl: 'eliminar.html',
})
export class EliminarPage {

  users:any[];

  constructor(public navCtrl: NavController, public navParams: NavParams,
     public service:ConexionProvider, public alertCtrl: AlertController) {
    this.readData();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad EliminarPage');
    
  }

  readData(){
    this.service.mostrarDatos().subscribe(
      data=> this.users = data,
      err => console.log(err)
    );

  }

  eliminar(req){
    console.log(req);
    let confirm = this.alertCtrl.create({
      title: 'Eliminar usuario?',
      message: 'Desea eliminar el usuario selecionado?',
      buttons: [
        {
          text: 'Cancelar',
          handler: () => {
            console.log('Disagree clicked');
          }
        },
        {
          text: 'Aceptar',
          handler: ()=> {
            console.log('Agree clicked');
            let params:any={
              id_user:req.id_user
            }
            console.log(params);

            this.service.eliminarUsuario(params)
            .subscribe(
            datos => {
              //this.showAlert(datos.mensaje);
              console.log(datos.mensaje)
              //this.readData();
              
            },
            err => console.log(err)
            );
          }
        }
      ]
    });
    confirm.present();
  }

  

}
