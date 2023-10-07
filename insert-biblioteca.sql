USE db_biblioteca;

INSERT INTO tb_editora (nm_editora, ds_editora) VALUES
('Rocco', 'Líder em publicações literárias, oferece uma vasta gama de obras de renomados autores nacionais e internacionais.'),
('José Olympio', 'A Editora José Olympio, fundada em 1931, é um pilar da cultura brasileira, publicando obras literárias de destaque, incluindo clássicos mundiais como "O Sol é Para Todos" e "O Menino do Dedo Verde".'),
('Civilização Brasileira', 'A Civilização Brasileira é uma renomada editora brasileira com uma longa história de publicações literárias e acadêmicas.'),
('Record', 'A Editora Record é uma das editoras mais importantes do Brasil, com um extenso catálogo de obras literárias e acadêmicas.'),
('Companhia das Letras', 'Uma das editoras mais renomadas do Brasil, com um catálogo diversificado de autores brasileiros e estrangeiros.'), -- 5
('Agir', 'Editora Agir, fundada em 1944, promove obras católicas. Adquirida pela Ediouro em 2002, manteve autonomia editorial e reformulou-se em 2004, editando clássicos como "O Pequeno Príncipe" e "Auto da Compadecida".'),
('Bestbolso', 'BestBolso oferece obras do Grupo Editorial Record em formato acessível e sem cortes. Autores renomados como Umberto Eco e Anne Frank têm destaque, e muitos títulos exclusivos encontram-se disponíveis apenas nesse formato, resgatando obras esgotadas.'),
('Intríseca', 'Intrínseca, fundada em 2003 por Jorge Oakim, destaca-se por contar histórias essenciais. Consolidou-se como importante editora brasileira, publicando cerca de 100 títulos por ano, é amada e reconhecida por oferecer bons livros.');



INSERT INTO tb_livro (nm_livro, ds_livro, cd_editora, isbn10, isbn13) VALUES
('Jogos Vorazes', 'Num futuro distópico, Katniss Everdeen luta pela sobrevivência ao participar dos brutais Jogos Vorazes, um evento mortal criado pelo governo. Enquanto enfrenta adversários, ela desafia o sistema e se torna um símbolo de resistência.', 1, '655532144X', '9786555321449'),
('O Sol é para todos', 'Clássico da literatura americana, "O Sol é Para Todos" de Harper Lee é um livro sobre racismo e injustiça. A história se passa nos anos 1930, quando um advogado defende um homem negro acusado de estuprar uma mulher branca. O livro é narrado pela filha do advogado, Scout, e aborda temas como tolerância, perda da inocência e conceito de justiça.', 2, '8503009498', '9788503009492'),
('Harry Potter e a Pedra Filosofal', '"Harry Potter e a Pedra Filosofal" é o início da jornada de um jovem bruxo, Harry, que descobre seu destino ao entrar em Hogwarts e enfrentar o mistério da pedra que concede imortalidade.', 1, '8532511015', '9788532511010'),
('Orgulho e Preconceito', 'Um romance clássico de Jane Austen que explora temas de amor, casamento e preconceito na sociedade inglesa do século XIX.', 3, '8520007325', '9788520007327'),
('O Diário de Anne Frank', 'O comovente diário escrito por Anne Frank enquanto ela e sua família estavam escondidos dos nazistas durante a Segunda Guerra Mundial.', 4, '8501044458', '9788501044457'),
('A Revolução dos Bichos', 'Uma sátira política escrita por George Orwell, que utiliza animais de uma fazenda como alegorias para comentar sobre a corrupção do poder.', 5, '8535909559', '9788535909555'),
('O Pequeno Príncipe', 'Uma história atemporal de Antoine de Saint-Exupéry sobre a amizade e a busca pelo significado da vida.', 6, '8522030820', '9788522030828'),
('1984', 'Um romance distópico de George Orwell que descreve um regime totalitário controlado pelo "Grande Irmão" e a luta de um homem contra a opressão.', 5, '8535914846', '9788535914849'),
('O Grande Gatsby', 'Um clássico de F. Scott Fitzgerald que explora a decadência da alta sociedade americana na década de 1920.', 7, '8577990354', '9788577990351'),
('A Menina que Roubava Livros', 'Um romance de Markus Zusak ambientado na Alemanha nazista, narrado pela Morte e centrado na vida de Liesel Meminger.', 8, '8598078379', '9788598078373'),
('Harry Potter e a Câmara Secreta', 'No segundo livro da série, Harry Potter retorna a Hogwarts para enfrentar mistérios e perigos escondidos na escola de magia e bruxaria.', 1, '853251166X', '9788532511669'),
('Harry Potter e o Prisioneiro de Azkaban', 'O terceiro livro da série acompanha Harry Potter enquanto ele descobre segredos sobre seu passado e enfrenta ameaças de um prisioneiro foragido.', 1, '8532512062', '9788532512062'),
('Harry Potter e o Cálice de Fogo', 'Neste quarto livro, Harry Potter participa do Torneio Tribruxo e enfrenta desafios mortais enquanto descobre um novo mistério.', 1, '8532512526', '9788532512529'),
('Harry Potter e a Ordem da Fênix', 'O quinto livro narra o treinamento de Harry e seus amigos para enfrentar o retorno de Lord Voldemort e a formação da Ordem da Fênix.', 1, '853251622X', '9788532516220'),
('Harry Potter e o Enigma do Príncipe', 'No sexto livro, Harry Potter desvenda segredos sobre o passado de Voldemort e enfrenta a crescente ameaça do Lorde das Trevas.', 1, '8532519474', '9788532519474'),
('Harry Potter e as Relíquias da Morte', 'O último livro da série segue Harry Potter em sua missão final para destruir as Horcruxes de Voldemort e enfrentar o confronto final.', 1, '8532522610', '9788532522610');