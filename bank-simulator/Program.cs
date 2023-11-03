using System;

namespace extrato_bancario
{
    class Program
    {

        static void Main(string[] args)
        {
            Console.Title = "Simulador Bancário";

            double balance = 0;
            startAplication();

            void startAplication()
            {
                Console.WriteLine("Simulador Bancário\n");
                getBalance();
                operationDialog();
            }

            void operationDialog()
            {
                Console.Write("\nEscolha um tipo de operacao!\nDigite ");
                Console.ForegroundColor = ConsoleColor.Green;
                Console.Write("d");
                Console.ResetColor();
                Console.Write(" para debito ou ");
                Console.ForegroundColor = ConsoleColor.Green;
                Console.Write("c");
                Console.ResetColor();
                Console.Write(" para crédito e pressione ");
                Console.ForegroundColor = ConsoleColor.Green;
                Console.Write("ENTER");
                Console.ResetColor();
                Console.Write(" : ");
                string operationType = Console.ReadLine();

                switch (operationType)
                {
                    case "d":
                        newTransaction("debit");
                        break;
                    case "c":
                        newTransaction("credit");
                        break;
                    default:
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.WriteLine("Operacao não encontrada, tente novamente!\n");
                        Console.ResetColor();
                        operationDialog();
                        break;
                }
            }

            void anotherOperationDialog()
            {
                Console.Write("Deseja realizar outra operacao?!\nDigite ");
                Console.ForegroundColor = ConsoleColor.Green;
                Console.Write("s");
                Console.ResetColor();
                Console.Write(" para sim ou ");
                Console.ForegroundColor = ConsoleColor.Red;
                Console.Write("n");
                Console.ResetColor();
                Console.Write(" para não e pressione ");
                Console.ForegroundColor = ConsoleColor.Green;
                Console.Write("ENTER");
                Console.ResetColor();
                Console.Write(" : ");
                string operationType = Console.ReadLine();

                switch (operationType)
                {
                    case "s":
                        operationDialog();
                        break;
                    case "n":
                        endApplication();
                        break;
                    default:
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.WriteLine("Opcao não encontrada, tente novamente!\n");
                        Console.ResetColor();
                        anotherOperationDialog();
                        break;
                }
            }

            void newTransaction(string type)
            {
                if (type == "debit")
                {
                    Console.Write("\nDigite o valor do débito: ");
                    try
                    {
                        double value = double.Parse(Console.ReadLine());
                        balance -= value;
                    }
                    catch
                    {
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.WriteLine("Oops, é necessário digitar um valor!");
                        Console.ResetColor();
                    }
                    getBalance("new");
                }
                if (type == "credit")
                {
                    Console.WriteLine("\nDigite o valor do crédito: ");
                    try
                    {
                        double value = double.Parse(Console.ReadLine());
                        balance += value;
                    }
                    catch
                    {
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.WriteLine("Oops, é necessário digitar um valor!");
                        Console.ResetColor();
                    }

                    getBalance("new");
                }
            }

            void getBalance(string type = "")
            {
                Console.Write($"\nSeu saldo é : ");
                if (balance < 0) Console.ForegroundColor = ConsoleColor.Red;
                if (balance > 0) Console.ForegroundColor = ConsoleColor.Green;
                Console.WriteLine(balance.ToString("C"));
                Console.WriteLine();
                Console.ResetColor();

                if (type == "new") anotherOperationDialog();
            }

            void endApplication()
            {
                getBalance();

                Console.WriteLine("Pressione qualquer tecla para encerrar a aplicacao ...");
                Console.ReadKey();
            }

        }
    }
}
