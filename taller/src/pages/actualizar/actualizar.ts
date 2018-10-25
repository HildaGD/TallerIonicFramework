import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import {ConexionProvider} from '../../providers/conexion/conexion';

/**
 * Generated class for the ActualizarPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-actualizar',
  templateUrl: 'actualizar.html',
})
export class ActualizarPage {

  users: any[];

  constructor(public navCtrl: NavController, public navParams: NavParams,
     public service: ConexionProvider, public alertCtrl:AlertController) {
    this.readData();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ActualizarPage');
  }

  readData(){
    this.service.mostrarDatos().subscribe(
      data=> this.users = data,
      err => console.log(err)
    );

  }

  sendData(req){
    console.log(req);

    let prompt = this.alertCtrl.create({
      title: 'Actualizar',
      message: "Actualiza los datos del usuario",
      inputs: [
        {
          name: 'nombre',
          placeholder: 'Nombre',
          value: req.nombre
        },{
          name: 'apellido',
          placeholder: 'Apellido',
          value: req.apellido
        },
      ],
      buttons: [
        {
          text: 'Cancel',
          handler: data => {
            console.log('Cancel clicked');
          }
        },
        {
          text: 'Save',
          handler: data => {
            console.log('Saved clicked');
          
             
            let params:any={
              id_user:req.id_usuario,
              nombre:data.nombre,
              apellido:data.apellido
            }
            console.log(params);            
            this.service.actualizarDatos(params)
            .subscribe(
            datos => {
              //this.showAlert(datos.mensaje);
              console.log(datos.mensaje)
              this.readData();
              
            },
            err => console.log(err)
            );
          }
        }
      ]
    });
    prompt.present();
     
     
   }


}
