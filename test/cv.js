'use strict';

const Code = require('@hapi/code');
const Lab = require('@hapi/lab');
const MarkdownLint = require('markdownlint');

const { expect } = Code;
const { describe, it } = exports.lab = Lab.script();

// Internals

const internals = {};

internals.lintConfig = {
    'comment': 'All rules',
    'default': true,
    'ul-indent': { indent: 4 },
    'no-trailing-spaces': { br_spaces: 2 },
    'line-length': false,
    'no-inline-html': false,
    'no-emphasis-as-header': false
};

internals.options = {
    files: ['src/cv.md'],
    config: internals.lintConfig
};


describe('README', () => {

    it('should lint', () => {

        // Arrange
        const options = {
            files: ['src/cv.md'],
            config: internals.lintConfig
        };

        // Act
        const actual = MarkdownLint.sync(options).toString(true);

        // Assert
        expect(actual).to.equal('');
    });
});
