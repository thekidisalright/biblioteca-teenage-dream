USE db_biblioteca;

INSERT INTO tb_editora (nm_editora, ds_editora) VALUES
('Rocco', 'Líder em publicações literárias, oferece uma vasta gama de obras de renomados autores nacionais e internacionais.'),
('Companhia das Letras', 'Uma das editoras mais renomadas do Brasil, com um catálogo diversificado de autores brasileiros e estrangeiros.'),
('Intrínseca', 'Especializada em best-sellers e livros de ficção, é conhecida por lançar grandes sucessos literários.'),
('Globo Livros', 'Parte do Grupo Globo, publica uma ampla variedade de gêneros, incluindo ficção, não-ficção e livros de referência.'),
('Editora Record', 'Uma das editoras mais antigas e respeitadas do país, com um histórico de publicações premiadas.'),
('Objetiva', 'Focada em literatura de qualidade, tem em seu catálogo autores de renome e obras premiadas.'),
('Leya', 'Uma editora que oferece uma ampla gama de gêneros, incluindo literatura, não-ficção, e-books e educação.'),
('Saraiva', 'Conhecida principalmente por suas publicações educacionais, a Saraiva também oferece uma variedade de títulos de entretenimento.'),
('Novo Século', 'Especializada em literatura brasileira e estrangeira, com uma abordagem para autores estreantes.'),
('Editora Sextante', 'Famosa por seus livros de desenvolvimento pessoal e autoajuda, além de romances e best-sellers.'),
('DarkSide Books', 'Editora focada em livros de terror e suspense, com edições caprichadas e ilustrações impressionantes.'),
('Gutenberg', 'Especializada em literatura infantojuvenil, oferece uma ampla variedade de livros para jovens leitores.'),
('Cia das Letras', 'Uma das maiores editoras do Brasil, com um catálogo diversificado que inclui obras literárias e de não-ficção.'),
('Martins Fontes', 'Editora com tradição em publicações acadêmicas e obras de referência.'),
('Editora 34', 'Conhecida por suas edições de qualidade de obras literárias e de ensaios críticos.');

-- Adicione aqui mais editoras populares conforme necessário



INSERT INTO tb_livro (nm_livro, ds_livro, cd_editora, isbn, `status`) VALUES
('Jogos Vorazes', 'Num futuro distópico, Katniss Everdeen luta pela sobrevivência ao participar dos brutais Jogos Vorazes, um evento mortal criado pelo governo. Enquanto enfrenta adversários, ela desafia o sistema e se torna um símbolo de resistência.', 1, '8579800242', 1);