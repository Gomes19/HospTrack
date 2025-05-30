# 🏥 HospTrack – Plataforma Multihospitalar com Localização Inteligente e Gestão Completa

**HospTrack** é uma poderosa plataforma SaaS de gestão hospitalar que permite que **múltiplos hospitais** se cadastrem e gerenciem suas unidades de forma independente. Cada usuário (administrador de hospital) pode configurar e operar seu próprio hospital virtual, com suporte a agendamento, médicos, pacientes, relatórios e localização via Google Maps.

---

## 🚀 O que torna o HospTrack diferente?

- 🌐 **Multihospital:** cada usuário pode criar e administrar seu próprio hospital.
- 📍 **Integração com Google Maps API:** localize os hospitais mais próximos com base na especialidade desejada.
- 📅 **Consulta em tempo real:** descubra se um hospital trata uma doença específica e se o médico está disponível.
- 🧑‍⚕️ **Gestão descentralizada:** médicos, pacientes, diagnósticos, atendimentos e agenda, tudo sob controle.
- 📊 **Relatórios e dashboards gerenciais interativos.**

---

## 🌟 Funcionalidades

- 🏥 Cadastro e gestão de vários hospitais;
- 👨‍⚕️ Gestão de médicos, especialidades, escalas e disponibilidade;
- 🧾 Registro de pacientes, diagnósticos e atendimentos;
- 📅 Agendamento de consultas e procedimentos;
- 📍 Localização de hospitais e filtragem por especialidade via Google Maps;
- 📊 Painel administrativo com estatísticas e gráficos;
- 📑 Geração de relatórios em PDF;
- 🔔 Notificações internas para eventos importantes.

---

## 📷 Capturas de Tela

> Substitua os links abaixo pelas imagens reais do seu projeto.

### 🌍 Localização Inteligente de Hospitais
![Mapa](https://via.placeholder.com/800x400.png?text=Mapa+de+Hospitais)

### 📊 Painel do Hospital
![Dashboard](https://via.placeholder.com/800x400.png?text=Dashboard+de+Hospital)

### 🧾 Relatório PDF Gerado
![Relatório](https://via.placeholder.com/800x400.png?text=Relatorio+em+PDF)

---

## 🛠 Tecnologias Utilizadas

- **Laravel 10 (PHP)**
- **MySQL**
- **Google Maps API**
- **Blade com Bootstrap**
- **Chart.js**
- **DomPDF**
- **Git + GitHub**

---

## ⚙️ Instalação

### Pré-requisitos

- PHP >= 8.1
- Composer
- MySQL
- Google Maps API Key

### Passos

```bash
git clone https://github.com/Gomes19/hosptrack.git
cd hosptrack
composer install
cp .env.example .env
php artisan key:generate
