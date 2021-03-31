/* Dado el siguiente arreglo [2,2,5,10,1,50] construir:
*
* Una función que permita conocer el mayor número del arreglo.
* Una función que permita conocer la moda (el número más repetido)
*
*/ 
import java.util.HashMap;


public class Punto_5 {
    public static void main(String args[]){        
        int[] arreglo = {2,2,5,10,1,50};
        mayor(arreglo);
        moda(arreglo);
    }

    public static void mayor(int[] arreglo){
        if (arreglo.length < 1){
            System.out.println("El arreglo esta vacio.");            
        }

        int mayor = arreglo[0];
        for (int i = 1; i< arreglo.length; i++ ){
            if (arreglo[i]>mayor){
                mayor = arreglo[i];
            }
        }

        System.out.println("El mayor es: "+ mayor);
    }

    public static void moda(int[] arreglo){
        if (arreglo.length < 1){
            System.out.println("El arreglo esta vacio.");
        }

        HashMap<Integer, Integer> conteo = new HashMap<>();
        int aux = 0;
        int mayor = 0, moda = 0;
        int contador=0;

        for (int i = 0; i < arreglo.length; i++) {
            aux = arreglo[i];
            if (conteo.containsKey(aux)) {
                conteo.put(aux, conteo.get(aux) + 1);
            } else {
                conteo.put(aux, 1);
            }            
        }

        for (Integer clave: conteo.keySet()) {            
            if (contador == 0){
                mayor = conteo.get(clave);
                moda = clave;
                contador ++;
            }else if(conteo.get(clave) > mayor){
                mayor = conteo.get(clave);
                moda = clave;
            }            
        }

        System.out.println("La moda es: "+ moda);
    }
}
