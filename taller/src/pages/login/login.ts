import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {ConexionProvider} from '../../providers/conexion/conexion';
//import {HomePage} from '../home/home';
//import { FormBuilder, FormGroup,Validators, AbstractControl  } from '@angular/forms';
/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {
  /*isLogged: boolean;
  usuario: string;
  password: string;
  public form: FormGroup;
  usuario:AbstractControl;
  password:AbstractControl;*/
  constructor(public navCtrl: NavController,
     public navParams: NavParams,
     public service:ConexionProvider/*,private formBuilder: FormBuilder*/) {
      
      // this.validacion();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }

  /*validacion(){
    this.form = this.formBuilder.group({
      
      usuario: [ '', Validators.required ],
      password: [ '',   [ Validators.required, Validators.minLength(4) ]
      ]
    });

    this.usuario = this.form.controls['usuario'];
      this.password = this.form.controls['password'];
      console.log(this.form.value);
  }*/

  login(req){
    console.log(req.value);

      this.service.login(req.value)
        .subscribe(
        datos => {
          if(datos.permiso == true){
            console.log(datos)
          }
          if (datos.permiso == false) {
            console.log('acceso denegado')
            console.log(datos.permiso)
          } 
          
        },
        err => console.log(err)
        );
    
    
  }

}
