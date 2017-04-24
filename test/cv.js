'use strict';

const Code = require('code');
const Lab = require('lab');
const MarkdownLint = require('markdownlint');


// Test shortcuts

const lab = exports.lab = Lab.script();
const describe = lab.describe;
const it = lab.it;
const expect = Code.expect;


// Internals

const internals = {};

internals.lintConfig = {
    'comment': 'All rules',
    'default': true,
    'ul-indent': { indent: 4 },
    'no-trailing-spaces': { br_spaces: 2 },
    'line-length': { line_length: 120, code_blocks: false, tables: false },
    'no-inline-html': false,
    'no-emphasis-as-header': false
};

internals.options = {
    files: ['src/cv.md'],
    config: internals.lintConfig
};


describe('README', () => {

    it('should lint', (done) => {

        // Arrange
        const options = {
            files: ['src/cv.md'],
            config: internals.lintConfig
        };

        // Act
        const actual = MarkdownLint.sync(options).toString(true);

        // Assert
        expect(actual).to.equal('');

        return done();
    });
});
