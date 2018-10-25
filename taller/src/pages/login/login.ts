import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {ConexionProvider} from '../../providers/conexion/conexion';
import {HomePage} from '../home/home';
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
  isLogged: boolean;
  usuario: string;
  password: string;
  constructor(public navCtrl: NavController,
     public navParams: NavParams,
     public service:ConexionProvider) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }

  login(){
    //console.log(datos.value);
    
    let f = { usuario: this.usuario, password: this.password };
    //console.log(f.value);
    this.service.login(f)
        .subscribe(
        rs => this.isLogged = rs,
        er => console.log(er),
        () => {
          if (this.isLogged) {
            console.log(this.usuario);
            console.log(this.password);
            console.log(this.isLogged);
            this.navCtrl.push(HomePage);
          }
          else {
            console.log('acceso denegado');
            this.login();
          }
        }
        );
  }

}
