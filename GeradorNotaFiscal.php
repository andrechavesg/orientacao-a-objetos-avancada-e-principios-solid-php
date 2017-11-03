<?php
    class GeradorNotaFiscal {

        private $acoesAposGerarNota;

        public function __construct() {
            $this->acoesAposGerarNota = [];
        }

        public function addAcao(AcaoAposGerarNota $acao) {
            $this->acoesAposGerarNota[] = $acao;
        }

        public function gera(Fatura $fatura) {

            $valor = $fatura->getValorMensal();

            $nf = new NotaFiscal($valor,$this->impostoSobreValor($valor));

            foreach ($this->acoesAposGerarNota as $acao) {
                $acao->executa($nf);
            }
        }

        private function impostoSobreValor($valor) {
            return $valor * 0.06;
        }
    }
