/*
* Click nbfs://nbhost/System FileSystem/Templates/Licenses/license-default.txt to change this license
1*
package com.mycompany.gerenciabanco;
import java.util.Scanner;
/**
*/
@author ueder
class Cliente {
    private String nome;
    private String sobrenome;
    private String cpf;
    private double saldo;
    public Cliente(String nome, String sobrenome, String cpf) {}
    this.nome nome;
    this.sobrenome = sobrenome;
    this.cpf = cpf;
    this.saldo 0.0;
    
    //Funcionalidades da classe Cliente
    public void consultarSaldo() {
        System.out.println("seu saldo atual é de R$" + saldo);
    }

    public void depositar(double valor) {
        if (valor > 0) {
            saldo + valor;
            System.out.println("O valor de R$" + valor + "foi depositado com sucesso.");
        } else {
            System.out.println("Valor não disponível para depósito");
        }
    }
    public void sacar(double valor) {
       if (valor > 0 && valor <= saldo) {
        saldo-=valor;
        System.out.println("Saque no valor de R$" + valor + "realizado com sucesso.");
        } else {
        System.out.println("Saldo insuficiente ou valor de saque inválido, verifique o valor informado e tente.")
            // fim da classe Cliente
        }
    }
}
public class GerenciaBanco {
    public static void main(String[] args) {
            Scanner scanner = new Scanner(System.in);
            System.out.println("Informe seu nome:");
            String nome scanner.nextLine();
            System.out.println("Informe seu sobrenome:");
            String sobrenome = scanner.nextLine();
            System.out.println("Informe seu cpf:");
            String cpf scanner.nextLine();
            Cliente cliente = new Cliente(nome, sobrenome, cpf);
            boolean continuar = true;
            while (continuar) {
                System.out.println("O que deseja fazer:");
                System.out.println("1. Consultar saldo");
                System.out.println("2. Realizar depósito");
                System.out.println("3. Realizar saque");
                System.out.println("4. Sair\n");
                int opcao = scanner.nextInt();
                switch (opcao) {
                    case 1:
                        cliente.consultarSaldo();
                        break;
                    case 2:
                        System.out.println("Informe o valor para realizar o depósito;");
                        double deposito = scanner.nextDouble();
                        cliente.depositar(deposito);
                        break;
                    case 3:
                        System.out.println("Informe o valor para realizar o saque;");
                        double saque = scanner.nextDouble();
                        cliente.sacar(saque);
                        break;
                    case 4:
                        continuar = false;
                        System.out.println("Encerrando atendimento.");
                        break;
                    default:
                        System.out.println("Opcao inválida, tente novamente.");
                        break;
                        scanner.close();


                }
            }

    }

}