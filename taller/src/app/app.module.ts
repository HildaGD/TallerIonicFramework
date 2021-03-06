import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { ActualizarPage } from '../pages/actualizar/actualizar';
import { CrearPage } from '../pages/crear/crear';
import { EliminarPage } from '../pages/eliminar/eliminar';
import{ MostrarPage } from '../pages/mostrar/mostrar';
import { LoginPage} from '../pages/login/login';

import { ConexionProvider } from '../providers/conexion/conexion';
import { HttpModule } from '@angular/http'; //importar para la conexion BD 


@NgModule({
  declarations: [
    MyApp,
    HomePage,
    ActualizarPage,
    CrearPage,
    EliminarPage,
    MostrarPage,
    LoginPage
  ],
  imports: [
    BrowserModule,
    HttpModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    ActualizarPage,
    CrearPage,
    EliminarPage,
    MostrarPage,
    LoginPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    ConexionProvider
  ]
})
export class AppModule {}
