pipeline {
    agent any
    environment {
        DOCKER_COMPOSE = "docker-compose"
        APP_SERVICE = "app"
        DB_SERVICE = "db"
    }
    stages {
        stage('Preparar Entorno') {
            steps {
                sh 'git pull origin master' // Debemos tener en cuenta que rama utilizamos en nuestro repo de git //master//main
                sh "${DOCKER_COMPOSE} down || true"
            }
        }
        stage('Construir Contenedores') {
            steps {
                sh "${DOCKER_COMPOSE} build"
            }
        }
        stage('Levantar Servicios') {
            steps {
                sh "${DOCKER_COMPOSE} up -d ${DB_SERVICE} ${APP_SERVICE}"
            }
        }
        stage('Correr Pruebas') {
            steps {
                sh "${DOCKER_COMPOSE} exec ${APP_SERVICE} php artisan migrate --seed"
                sh "${DOCKER_COMPOSE} exec ${APP_SERVICE} vendor/bin/phpunit"
            }
        }
        stage('Desplegar a Entorno de Pruebas') {
            steps {
                sh "${DOCKER_COMPOSE} -f docker-compose.test.yml up -d"
            }
        }
    }
    post {
        success {
            mail to: 'erick_salamanca@icloud.com',
                subject: "Pipeline Exitoso: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                body: "El pipeline fue ejecutado correctamente en Jenkins."
        }
        failure {
            mail to: 'erick_salamanca@icloud.com',
                subject: "Fallo en el Pipeline: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                body: "El pipeline falló. Revisa los logs en Jenkins."
        }
    }
}




