# CareFlow ERP – Plataforma SaaS Multihospitalar para Gestão Integrada

No universo complexo da saúde, a gestão eficiente dos hospitais faz toda a diferença para salvar vidas e otimizar recursos. **CareFlow ERP** nasce para revolucionar a administração hospitalar, permitindo que múltiplos hospitais se cadastrem, gerenciem suas operações e ofereçam um atendimento de excelência.

Com uma integração poderosa à API do Google Maps, o sistema permite que pacientes encontrem facilmente os hospitais mais próximos que tratam suas condições específicas e saibam quais médicos estão disponíveis — tudo com transparência e facilidade.

Além disso, os gestores contam com dashboards dinâmicos, gráficos intuitivos e geração automatizada de relatórios, facilitando a tomada de decisões estratégicas e o acompanhamento em tempo real do desempenho de cada unidade. O Super Admin mantém o controle rigoroso da plataforma, aprovando cada hospital que se cadastra e assegurando a qualidade do ecossistema.

---

## 🚀 Por que escolher o CareFlow ERP?

- Plataforma SaaS multihospitalar para gestão independente e integrada  
- Localização inteligente via Google Maps para conectar pacientes aos hospitais certos  
- Controle completo de médicos, pacientes, especialidades e tratamentos  
- Dashboards e relatórios inteligentes para decisões mais rápidas e assertivas  
- Super Admin garante qualidade, segurança e confiabilidade do sistema  

**CareFlow ERP** não é só tecnologia — é o futuro da gestão hospitalar em suas mãos.

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
