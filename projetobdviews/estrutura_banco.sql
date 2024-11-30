CREATE DATABASE SISTEMA_RESERVA;
USE SISTEMA_RESERVA;
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel ENUM('adm', 'colab') NOT NULL
);

CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE espacos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    localizacao VARCHAR(100) NOT NULL,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

CREATE TABLE eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATETIME NOT NULL,
    nome VARCHAR(100) NOT NULL,
    lotacao_maxima INT NOT NULL
    
);

CREATE TABLE pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(50) NOT NULL,
    rg VARCHAR(50) NOT NULL
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_reserva DATETIME NOT NULL,
    status ENUM('confirmada', 'pendente', 'cancelada') NOT NULL,
    evento_id INT NOT NULL,
    espaco_id INT NOT NULL,
    pessoa_id INT NOT NULL,
    FOREIGN KEY (evento_id) REFERENCES eventos(id),
    FOREIGN KEY (espaco_id) REFERENCES espacos(id),
    FOREIGN KEY (pessoa_id) REFERENCES pessoa(id)
);  