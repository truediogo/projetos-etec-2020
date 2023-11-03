using System;

namespace exercicios
{
    public class Exercicios
    {
        // Desenvolva um algoritmo que calcule o reajuste salarial. Se o salário for abaixo de
        // 1.700 o ajuste é de R$300.00, se maior de R$ 200.00. Para finalizar, exiba o novo salário na
        // tela.
        public float salario(float valor)
        {
            float novosalario = 0;

            if (valor < 1700) novosalario = valor + 300;
            if (valor >= 1700) novosalario = valor + 200;

            return novosalario;
        }

        //Faça um algoritmo que exiba quantas pessoas possuem mais de 18 anos. O algoritmo
        // deverá ler a idade de 10 pessoas.
        public bool maiorIdade(int idade)
        {
            if (idade >= 18) return true;

            return false;
        }

        //Escreva um programa que usando a instrução switch e que a partir de um valor informado pelo usuário realize as seguintes conversões :
        //1.P -> Polegadas para Centímetros
        //2.G -> Galão para Litros
        //3.M -> Milhas para Quilômetros

        public double polegadasParaCentimetros(double polegadas)
        {
            double cm = polegadas * 2.54;
            return cm;
        }

        public double galoesParaLitros(double galoes)
        {
            double litros = galoes * 3.78;
            return litros;
        }

        public double milhasParaQuilometros(double milhas)
        {
            double km = milhas * 1.609;
            return km;
        }
    }
}
