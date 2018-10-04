import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

//Importar 
import {Http, Headers, Response} from '@angular/http';
import 'rxjs/add/operator/map'; // función de map <- necesaria de importar
/*
  Generated class for the ConexionProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ConexionProvider {
  //Ruta para acortar la busqueda. Un puente para conexión de la aplicación IONIC con la base de datos en Mysql
  api: string = 'http://localhost/ionic/prueba/';
  
  constructor(public http: Http) {
     
  }

  //lECTURA DE DATOS

  //Se crea la función para porder establecer la conexión a la base de datos
  // Función para mandar a llamar datos

  mostrarDatos(){
    // se debe de importar la función map, también para la función de json
    return this.http.get(this.api + 'listar.php').map(res => res.json())
  }

   //GUARDAR DATOS EN LA BASE DE DATOS
   guardarDatos(datos){
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });
    return this.http.post(this.api + "insertarUsuario.php", datos,
      {
        headers: headers,
        method: "POST"
      }).map(
      (res:Response)=>{return res.json()}
      );

  }

   //ACTULIZAR

   actualizarDatos(datos){
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });
    return this.http.post(this.api + "actualizarUsuario.php", datos,
      {
        headers: headers,
        method: "POST"
      }).map(
      (res:Response)=>{return res.json()}
      );
  }
//ELIMINAR//


  eliminarUsuario(dato){
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });
    return this.http.post(this.api + "eliminarUsuario.php", dato,
      {
        headers: headers,
        method: "POST"
      }).map(
      (res:Response)=>{return res.json()}
      );
  }

}