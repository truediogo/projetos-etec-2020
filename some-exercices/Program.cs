using System;

namespace exercicios
{
    class Program
    {
        static void Main()
        {
            string userOption = getUserOption();
            Exercicios exercicios = new Exercicios();

            while (userOption.ToUpper() != "X")
            {
                switch (userOption)
                {
                    case "1":
                        Console.Write("Digite o salário: ");
                        if (float.TryParse(Console.ReadLine(), out float valor))
                        {
                            float novosalario = exercicios.salario(valor);

                            Console.WriteLine("Salario com reajuste: " + novosalario.ToString("C"));
                        }
                        else
                        {
                            Console.WriteLine("Opps, é necessário um valor numérico");
                        };
                        break;
                    case "2":
                        int contador = 0;

                        for (int i = 0; i < 10; i++)
                        {
                            Console.Write("Digite uma idade: ");

                            if (int.TryParse(Console.ReadLine(), out int idade))
                            {
                                if (exercicios.maiorIdade(idade)) contador++;
                            }
                            else
                            {
                                Console.WriteLine("Opps, é necessário um valor numérico");
                            };

                        }
                        Console.WriteLine($"\nMaiores de idade: {contador}");
                        break;
                    case "3":
                        string conversionOption = getConversionOption();

                        while (conversionOption.ToUpper() != "X")
                        {
                            switch (conversionOption)
                            {
                                case "1":
                                    Console.WriteLine("Digite o valor em polegadas:");
                                    if (double.TryParse(Console.ReadLine(), out double polegadas))
                                    {
                                        double resultado = exercicios.polegadasParaCentimetros(polegadas);

                                        Console.WriteLine($"\nO valor de {polegadas} polegadas em centímetros é : {resultado}cm");
                                    }
                                    else
                                    {
                                        Console.WriteLine("Opps, é necessário um valor numérico");
                                    };
                                    break;
                                case "2":
                                    Console.WriteLine("Digite o valor em galões:");
                                    if (double.TryParse(Console.ReadLine(), out double galoes))
                                    {
                                        double resultado = exercicios.galoesParaLitros(galoes);

                                        Console.WriteLine($"\nO valor de {galoes} galões em litros é : {resultado}l");
                                    }
                                    else
                                    {
                                        Console.WriteLine("Opps, é necessário um valor numérico");
                                    };
                                    break;
                                case "3":
                                    Console.WriteLine("Digite o valor em milhas:");
                                    if (double.TryParse(Console.ReadLine(), out double milhas))
                                    {
                                        double resultado = exercicios.milhasParaQuilometros(milhas);

                                        Console.WriteLine($"\nO valor de {milhas} milhas em quilômetros é : {resultado}km");
                                    }
                                    else
                                    {
                                        Console.WriteLine("Opps, é necessário um valor numérico");
                                    };
                                    break;
                                default:
                                    throw new ArgumentOutOfRangeException();
                            }

                            Console.WriteLine("\nDigite qualquer tecla para entrar acessar outro exercício ou repetir");
                            Console.ReadKey();
                            Console.Clear();
                            Main();
                            return;
                        }
                        break;
                    default:
                        throw new ArgumentOutOfRangeException();
                }

                Console.WriteLine("\nDigite qualquer tecla para entrar acessar outro exercício ou repetir");
                Console.ReadKey();
                Console.Clear();
                Main();
            }
        }

        static string getUserOption()
        {
            Console.WriteLine("Escolha o exercício:\n");
            Console.WriteLine("1 - Reajuste salarial");
            Console.WriteLine("2 - Listar Alunos");
            Console.WriteLine("3 - Conversor de medidas");
            Console.WriteLine("X - Sair\n");

            string userOption = Console.ReadLine();
            Console.WriteLine();
            return userOption;
        }

        static string getConversionOption()
        {
            Console.WriteLine("Escolha a medida a converter:\n");
            Console.WriteLine("1 - Polegada para centrimetros");
            Console.WriteLine("2 - Galão para litros");
            Console.WriteLine("3 - Milhas para quilômetros");
            Console.WriteLine("X - Sair\n");

            string userOption = Console.ReadLine();
            Console.WriteLine();
            return userOption;
        }

    }
}
