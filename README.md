# Projeto LPM - Gestão de Estacionamentos Java Parkings

Bem-vindo ao repositório do **Projeto Prático de Laboratório de Programação Modular**. Este projeto tem como objetivo desenvolver um sistema para a gestão de estacionamentos, aplicando conceitos de modularidade e o paradigma de orientação a objetos.

---

## 📝 **Visão Geral do Projeto**

A escassez de vagas de estacionamento no centro das grandes cidades motivou a **Xulambs Inc.** a desenvolver um sistema para gerenciar seus futuros estacionamentos. Este projeto será desenvolvido de forma incremental, com sprints que incorporam novos requisitos e funcionalidades.

### Principais Funcionalidades:
- Gerenciamento de múltiplos estacionamentos, cada um com vagas identificadas alfanumericamente.
- Registro de veículos associados a clientes (nome e identificador), permitindo múltiplos veículos por cliente.
- Controle de ocupação de vagas com cobrança baseada no tempo de uso.
- Tarifação:
  - R$4 a cada 15 minutos.
  - Valor máximo: R$50.
- Diferenciação de vagas:
  - Regulares, Idosos (15% desconto), PCD (13% desconto), VIP (20% acréscimo).

---

## 📅 **Cronograma e Entregas**

### **Sprint 1**
**Entrega 01**:
- Elaboração do diagrama de classes inicial.

**Entrega 02**:
- Atualização do diagrama de classes com feedback do professor.
- Código inicial do projeto baseado no diagrama.

---

### **Sprint 2**
**Novos Requisitos**:
- Inclusão de diferentes tipos de vagas: **Idosos**, **PCD**, **VIP**.
- Regras específicas para cada tipo de vaga.

**Entregas**:
- Atualização do diagrama de classes.
- Implementação das classes e métodos correspondentes.
- Definição e implementação de testes unitários (mínimo de 2 por classe).
- Persistência dos dados em arquivos texto.
- Apresentação do sistema.

---

### **Sprint 3**
**Novos Requisitos**:
- Histórico de uso do estacionamento por cliente.
- Consultas financeiras:
  - Valor total arrecadado.
  - Valor arrecadado em determinado mês.
  - Valor médio por utilização.
  - Ranking de clientes que mais geraram receita em um mês.

**Entregas**:
- Reorganização do código com a arquitetura **MVC**.
- Interface gráfica utilizando **Java Swing**.
- Persistência dos dados em arquivos.

---

### **Sprint 4**
**Release Final**:
- Migração da persistência para um banco de dados relacional (MariaDB, MySQL, PostgreSQL ou Oracle) com conexão via JDBC.
- Inclusão de novas consultas SQL:
  - Utilização de `JOIN`, `GROUP BY` e funções de agregação.
- Implementação de tratamento de exceções:
  - Pelo menos três classes personalizadas.
- Apresentação final:
  - Slides focados em funcionalidades, arquitetura, consultas SQL e proposta de valor.
  - Demonstração do sistema.
- Relatório técnico em formato **SBC**, incluindo:
  - Funcionalidades implementadas.
  - Consultas SQL detalhadas.
  - Diagramas de Classes e Entidade-Relacionamento.
  - Relato de experiência dos integrantes.
  - Dificuldades e aprendizados.
  - Sugestões de melhorias.

---

## 📂 **Estrutura do Repositório**
