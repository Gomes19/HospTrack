# HospTrack – Plataforma SaaS Multihospitalar com Localização Inteligente e Gestão Completa

**HospTrack** é uma plataforma SaaS moderna que permite o cadastro e a gestão independente de múltiplos hospitais. Cada hospital possui controle total sobre médicos, pacientes, especialidades, agendamentos, relatórios e muito mais. Um perfil de **Super Admin** gerencia e valida os cadastros das instituições para garantir segurança e qualidade.

---

## 🚀 Funcionalidades Principais

- Cadastro e gestão de múltiplos hospitais em ambiente isolado
- Perfil Super Admin para aprovar ou rejeitar novos cadastros
- Gestão completa do hospital: médicos, especialidades, pacientes, atendimentos e agenda
- Integração com Google Maps API para localização dos hospitais próximos
- Filtro por doenças e disponibilidade dos médicos nos hospitais
- Dashboard com gráficos e estatísticas para análise operacional
- Geração de relatórios detalhados em PDF
- Sistema de notificações internas para alertas importantes

---

## 🛠 Tecnologias Utilizadas

- Laravel 10 (PHP)
- MySQL
- Google Maps API
- Blade + Bootstrap 5
- Chart.js para gráficos
- DomPDF para geração de PDFs
- Git / GitHub para versionamento

---

## ⚙️ Instalação

### Requisitos

- PHP >= 8.1
- Composer
- MySQL
- Google Maps API Key

### Passos para rodar localmente

```bash
git clone https://github.com/Gomes19/hosptrack.git
cd hosptrack
composer install
cp .env.example .env
php artisan key:generate
