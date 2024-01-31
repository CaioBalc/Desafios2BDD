CREATE TABLE public.funcionarios (
    id serial4 NOT NULL,
    nome varchar (100) NULL,
    genero varchar(10) NULL,
    idade int4 NULL,
    salario numeric(10, 2) NULL,
    CONSTRAINT funcionarios_pkey PRIMARY KEY (id)
);