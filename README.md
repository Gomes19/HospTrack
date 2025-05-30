# CareFlow ERP – Plataforma SaaS Multihospitalar para Gestão Integrada

**CareFlow ERP** é uma plataforma SaaS robusta que permite o cadastro e a gestão independente de múltiplos hospitais. Cada hospital pode gerenciar suas operações, enquanto um perfil de Super Admin controla a aprovação dos cadastros, garantindo a qualidade do sistema.

---

## 🚀 Funcionalidades Principais

- Cadastro e gestão independente de múltiplos hospitais
- Perfil Super Admin para aprovação ou rejeição de novos hospitais cadastrados
- Gestão completa do hospital: médicos, pacientes, especialidades, agendamentos e tratamentos
- Integração com API do Google Maps para localizar hospitais próximos e verificar especialidades e médicos disponíveis
- Dashboard com gráficos e estatísticas para análise operacional e tomada de decisões
- Geração de relatórios detalhados em PDF
- Sistema de notificações para alertas e comunicados importantes

---

## 🛠 Tecnologias Utilizadas

- Laravel 10 (PHP)  
- MySQL  
- Integração com API Google Maps  
- Blade + Bootstrap 5  
- Chart.js para gráficos  
- DomPDF para geração de relatórios em PDF  
- Git / GitHub para versionamento

---

## ⚙️ Instalação

### Requisitos

- PHP >= 8.1  
- Composer  
- MySQL  
- Chave API do Google Maps (Google Maps API Key)

### Passos para rodar localmente

```bash
git clone https://github.com/Gomes19/careflow-erp.git
cd careflow-erp
composer install
cp .env.example .env
php artisan key:generate
