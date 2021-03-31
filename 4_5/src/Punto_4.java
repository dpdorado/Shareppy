/*
 * Realice una función que reciba un valor numérico como parámetro entre 
 * los valores 1 y 5, y que retorne: 
 * 3.1- la hora actual, 
 * 3.2- la hora actual más el digito ingresado convertido en minutos.
 * 
 * Ejemplo:
 * “Ingrese el número 3, respuesta: hora actual: 11:05, hora más digito: 11:08”
 */

import java.util.Calendar;
import java.util.Date;
import java.text.DateFormat;  
import java.text.SimpleDateFormat;  


public class Punto_4 {
    public static void main(String args[]){
        punto_4(3);

    }

    public static void punto_4(int numero){
        if (numero <1 || numero >5){
            System.out.println("El número debe estar entre 1 y 5");
        }

        Date hora_actual= new Date();
        DateFormat dateFormat = new SimpleDateFormat("HH:mm:ss");
                

        Calendar calendar = Calendar.getInstance();
        calendar.setTime(hora_actual); 
        calendar.add(Calendar.MINUTE, numero);
        
        Date horaSalida = calendar.getTime();

        System.out.println("hora actual: "+dateFormat.format(hora_actual)+
            ", hora más dígito: "+dateFormat.format(horaSalida));        
    }
}
