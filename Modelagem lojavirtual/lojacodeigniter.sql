SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`configuracao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`configuracao` (
  `codconfiguracao` INT NOT NULL AUTO_INCREMENT ,
  `nomeloja` VARCHAR(100) NOT NULL ,
  `enderecoloja` VARCHAR(100) NOT NULL ,
  `cnpjloja` VARCHAR(14) NOT NULL ,
  `emailloja` VARCHAR(100) NOT NULL ,
  `cidadeloja` VARCHAR(45) NOT NULL ,
  `ufloja` CHAR(2) NOT NULL ,
  PRIMARY KEY (`codconfiguracao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`comprador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`comprador` (
  `codcomprador` INT NOT NULL AUTO_INCREMENT COMMENT 'Armazena os clientes da loja.' ,
  `nomecomprador` VARCHAR(100) NOT NULL ,
  `enderecocomprador` VARCHAR(100) NOT NULL ,
  `cidadecomprador` VARCHAR(100) NOT NULL ,
  `ufcomprador` CHAR(2) NOT NULL ,
  `cepcomprador` VARCHAR(8) NOT NULL ,
  `emailcomprador` VARCHAR(100) NOT NULL ,
  `telefonecomprador` VARCHAR(100) NULL ,
  `cpfcomprador` VARCHAR(11) NOT NULL ,
  `sexocomprador` CHAR(2) NOT NULL ,
  `senhacomprador` VARCHAR(300) NOT NULL ,
  PRIMARY KEY (`codcomprador`) ,
  UNIQUE INDEX `emailcomprador_UNIQUE` (`emailcomprador` ASC) ,
  UNIQUE INDEX `cpfcomprador_UNIQUE` (`cpfcomprador` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`usuario` (
  `codusuario` INT NOT NULL AUTO_INCREMENT COMMENT 'Armazena os usuaários do painel.' ,
  `nomeusuario` VARCHAR(100) NOT NULL ,
  `emailusuario` VARCHAR(100) NOT NULL ,
  `senhausuario` VARCHAR(300) NOT NULL ,
  `ativadousuario` CHAR(1) NOT NULL ,
  PRIMARY KEY (`codusuario`) ,
  UNIQUE INDEX `emailusuario_UNIQUE` (`emailusuario` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`departamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`departamento` (
  `codepartamento` INT NOT NULL AUTO_INCREMENT COMMENT 'Departamento do produto' ,
  `nomedepartamento` VARCHAR(45) NOT NULL ,
  `coddepartamentopai` INT NULL ,
  PRIMARY KEY (`codepartamento`) ,
  INDEX `fk_produtodepartamento_produtodepartamento_idx` (`coddepartamentopai` ASC) ,
  CONSTRAINT `fk_produtodepartamento_produtodepartamento`
    FOREIGN KEY (`coddepartamentopai` )
    REFERENCES `lojacodeigniter`.`departamento` (`codepartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`produto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`produto` (
  `codproduto` INT NOT NULL AUTO_INCREMENT ,
  `nomeproduto` VARCHAR(100) NOT NULL ,
  `resumoproduto` TEXT NOT NULL ,
  `fichaproduto` TEXT NOT NULL ,
  `valorproduto` DECIMAL(10,2) NOT NULL ,
  PRIMARY KEY (`codproduto`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`produtodepartamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`produtodepartamento` (
  `produto_codproduto` INT NOT NULL ,
  `produtodepartamento_codprodutodepartamento` INT NOT NULL ,
  PRIMARY KEY (`produto_codproduto`, `produtodepartamento_codprodutodepartamento`) ,
  INDEX `fk_produto_has_produtodepartamento_produtodepartamento1_idx` (`produtodepartamento_codprodutodepartamento` ASC) ,
  INDEX `fk_produto_has_produtodepartamento_produto1_idx` (`produto_codproduto` ASC) ,
  CONSTRAINT `fk_produto_has_produtodepartamento_produto1`
    FOREIGN KEY (`produto_codproduto` )
    REFERENCES `lojacodeigniter`.`produto` (`codproduto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_produtodepartamento_produtodepartamento1`
    FOREIGN KEY (`produtodepartamento_codprodutodepartamento` )
    REFERENCES `lojacodeigniter`.`departamento` (`codepartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`tipoatributo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`tipoatributo` (
  `codtipoatributo` INT NOT NULL AUTO_INCREMENT ,
  `nometipoatributo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`codtipoatributo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`atributo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`atributo` (
  `codatributo` INT NOT NULL AUTO_INCREMENT ,
  `nomeatributo` VARCHAR(45) NOT NULL ,
  `codtipoatributo` INT NOT NULL ,
  PRIMARY KEY (`codatributo`) ,
  INDEX `fk_atributo_tipoatributo1_idx` (`codtipoatributo` ASC) ,
  CONSTRAINT `fk_atributo_tipoatributo1`
    FOREIGN KEY (`codtipoatributo` )
    REFERENCES `lojacodeigniter`.`tipoatributo` (`codtipoatributo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`atributoproduto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`atributoproduto` (
  `codproduto` INT NOT NULL ,
  `codatributo` INT NOT NULL ,
  `codatributoproduto` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_produto_has_atributo_atributo1_idx` (`codatributo` ASC) ,
  INDEX `fk_produto_has_atributo_produto1_idx` (`codproduto` ASC) ,
  PRIMARY KEY (`codatributoproduto`) ,
  CONSTRAINT `fk_produto_has_atributo_produto1`
    FOREIGN KEY (`codproduto` )
    REFERENCES `lojacodeigniter`.`produto` (`codproduto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_atributo_atributo1`
    FOREIGN KEY (`codatributo` )
    REFERENCES `lojacodeigniter`.`atributo` (`codatributo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`carrinho`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`carrinho` (
  `codcarrinho` INT ZEROFILL NOT NULL AUTO_INCREMENT ,
  `datahoracompra` TIMESTAMP NOT NULL ,
  `valorcompra` DECIMAL(10,2) NOT NULL ,
  `valorfrete` DECIMAL(10,2) NULL ,
  `valorfinalcompra` DECIMAL(10,2) NOT NULL ,
  `codcomprador` INT NOT NULL ,
  PRIMARY KEY (`codcarrinho`) ,
  INDEX `fk_carrinho_comprador1_idx` (`codcomprador` ASC) ,
  CONSTRAINT `fk_carrinho_comprador1`
    FOREIGN KEY (`codcomprador` )
    REFERENCES `lojacodeigniter`.`comprador` (`codcomprador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lojacodeigniter`.`itemcarrinho`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lojacodeigniter`.`itemcarrinho` (
  `coditemcarrinho` INT NOT NULL AUTO_INCREMENT ,
  `valoritem` DECIMAL(10,2) NOT NULL ,
  `quantidadeitem` INT NOT NULL ,
  `codcarrinho` INT ZEROFILL NOT NULL ,
  `codproduto` INT NOT NULL ,
  PRIMARY KEY (`coditemcarrinho`) ,
  INDEX `fk_itemcarrinho_carrinho1_idx` (`codcarrinho` ASC) ,
  INDEX `fk_itemcarrinho_produto1_idx` (`codproduto` ASC) ,
  CONSTRAINT `fk_itemcarrinho_carrinho1`
    FOREIGN KEY (`codcarrinho` )
    REFERENCES `lojacodeigniter`.`carrinho` (`codcarrinho` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemcarrinho_produto1`
    FOREIGN KEY (`codproduto` )
    REFERENCES `lojacodeigniter`.`produto` (`codproduto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
