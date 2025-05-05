# Cast-Wave-Basic

## ⚙️ Requisitos para Executar o Projeto

1. **Servidor Local**
   - Instale o [XAMPP](https://www.apachefriends.org/index.html)
   - Inicie os módulos **Apache** e **MySQL**

2. **Banco de Dados**
   - Acesse o `phpMyAdmin`
   - Crie o banco de dados `castwave`
   - Execute o script SQL abaixo para criar as tabelas necessárias:

```sql
CREATE DATABASE IF NOT EXISTS castwave;
USE castwave;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(20) UNIQUE NOT NULL,
    data_nasc DATE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS contatos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  assunto VARCHAR(100) NOT NULL,
  mensagem TEXT NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```