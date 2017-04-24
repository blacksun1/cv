pipeline {
    agent any

    stages {
        stage('build') {
            steps {
                echo 'Building'
                sh 'sh ./build.sh'
                archive 'dist/**/*'
            }
        }
        stage('Test') {
            steps {
                echo 'Testing'

                sh 'node --version'
                sh 'npm --version'
                sh 'npm prune'
                sh 'npm install'
                sh 'npm test -- --reporter console --output stdout --reporter junit --output ./test_output-junit.xml --reporter html --output ./test_output.html'
            }
        }
        stage('Cleanup') {
            steps {
                echo 'prune and cleanup'

                sh 'npm prune'
                sh 'rm -rf node_modules'
            }
        }
    }
    post {
        always {
            junit 'test_output-junit.xml'
            archive 'test_output*'
        }
    }
}
