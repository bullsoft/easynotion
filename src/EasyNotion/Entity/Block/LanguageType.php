<?php
namespace EasyNotion\Entity\Block;

use EasyNotion\Common\TypeInterface;

enum LanguageType: string implements TypeInterface
{
    case Abap = 'abap';
    case Arduino = 'arduino';
    case Bash = 'bash';
    case Basic = 'basic';
    case C = 'c';
    case Clojure = 'clojure';
    case Coffeescript = 'coffeescript';
    case Cpp = 'c++';
    case CSharp = 'c#';
    case Css = 'css';
    case Dart = 'dart';
    case Diff = 'diff';
    case Docker = 'docker';
    case Elixir = 'elixir';
    case Elm = 'elm';
    case ErLang = 'erlang';
    case Flow = 'flow';
    case Fortran = 'fortran';
    case FSharp = 'f#';
    case Gherkin = 'gherkn';
    case Glsl = 'glsl';
    case Go = 'go';
    case GraphQL = 'graphql';
    case Groovy = 'groovy';
    case Haskell = 'haskell';
    case Html = 'html';
    case Java = 'java';
    case Javascript = 'javascript';
    case Json = 'json';
    case Julia = 'julia';
    case Kotlin = 'kotlin';
    case Latex = 'latex';
    case Less = 'less';
    case Lisp = 'lisp';
    case Livescript = 'livescript';
    case Lua = 'lua';
    case Makefile = 'makefile';
    case Markdown = 'markdown';
    case Markup = 'markup';
    case Matlab = 'matlab';
    case Mermaid = 'mermaid';
    case Nix = 'nix';
    case ObjectiveC = 'objective-c';
    case Ocaml = 'ocaml';
    case Pascal = 'pascal';
    case Perl = 'perl';
    case Php = 'php';
    case PlainText = 'plain text';
    case Powershell = 'powershell';
    case Prolog = 'prolog';
    case Protobuf = 'protobuf';
    case Python = 'python';
    case R = 'r';
    case Reason = 'reason';
    case Ruby = 'ruby';
    case Rust = 'rust';
    case Sass = 'sass';
    case Scala = 'scala';
    case Scheme = 'scheme';
    case Scss = 'scss';
    case Shell = 'shell';
    case Sql = 'sql';
    case Swift = 'swift';
    case Typescript = 'typescript';
    case VbDotNet = 'vb.net';
    case Verilog = 'verilog';
    case Vhdl = 'vhdl';
    case VisualBasic = 'visual basic';
    case Webassembly = 'webassembly';
    case Xml = 'xml';
    case Yaml = 'yaml';
    case JavaOrCOrCppOrCSharp = 'java/c/c++/c#';

    public function resolve(array|string $val)
    {
    }
}